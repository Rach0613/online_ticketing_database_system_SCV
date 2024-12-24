<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\Seat;
use App\Models\Booking;
use App\Models\Payment;

class TicketController extends Controller
{
    public function allTickets()
    {
        $userId = auth()->id();

        // Fetch all bookings for the authenticated user, including related show data
        $bookings = Booking::with(['show', 'seats'])
            ->where('user_id', $userId)
            ->orderBy('booking_date', 'desc')
            ->get();

        return view('ticket.tickets', compact('bookings'));
    }


    public function timeDate()
    {
        return view('ticket.timedate');
    }

    public function storeTimeDate(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'slot' => 'required|in:morning,afternoon,evening',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
        ]);
    
        session()->put('timedate', $validated);
    
        // Debugging: Check if session data is stored correctly
        // dd(session('timedate'));
    
        return redirect()->route('ticket.select_seat');
    }

    public function selectSeat()
    {
        $timedate = session('timedate');
    
        if (!$timedate) {
            return redirect()->route('ticket.timedate')->with('error', 'Please select a date and slot first.');
        }
    
        $show = Show::where('date', $timedate['date'])->where('slot', $timedate['slot'])->first();
    
        if (!$show) {
            return redirect()->route('ticket.timedate')->with('error', "No show available for the selected {$timedate['date']} date and {$timedate['slot']} slot.");
        }
    
        $seats = Seat::where('show_id', $show->id)
            ->select('id', 'row', 'number', 'status') // Specify columns to avoid duplicate fetching
            ->distinct()
            ->orderBy('row')
            ->orderBy('number')
            ->get();
    
        return view('ticket.select_seat', compact('seats', 'timedate'));
    }
    
        public function storeSelectedSeats(Request $request)
    {
        $validated = $request->validate(['seats' => 'required|array']);

        // Check if all selected seats are available
        $selectedSeats = Seat::whereIn('id', $validated['seats'])->get();

        foreach ($selectedSeats as $seat) {
            if ($seat->is_available == 0) {
                return redirect()->back()->with('error', 'One or more selected seats are unavailable.');
            }
        }

        // Mark selected seats as "reserved"
        Seat::whereIn('id', $validated['seats'])->update([
            'status' => 'selected',
            'is_available' => 0, // Mark as unavailable
        ]);

        session()->put('selected_seats', $validated['seats']);
        return redirect()->route('ticket.checkout');
    }


        public function checkout()
    {
        $timedate = session('timedate');
        $selectedSeats = session('selected_seats');

        if (!$timedate || !$selectedSeats) {
            return redirect()->route('ticket.timedate')->with('error', 'Missing data.');
        }

        // Retrieve seat details for the selected seat IDs
        $seats = Seat::whereIn('id', $selectedSeats)->get();

        // Calculate the total amount based on the number of seats and pricing
        $adultPrice = 50.00;
        $childPrice = 25.00;
        $totalAmount = ($timedate['adults'] * $adultPrice) + ($timedate['children'] * $childPrice);

        return view('ticket.checkout', compact('timedate', 'seats', 'totalAmount'));
    }

    
    public function processPayment(Request $request)
{
    $validated = $request->validate([
        'card_name' => 'required|string|max:255',
        'card_number' => 'required|digits:16',
        'expiry_date' => 'required|string|max:4', 
        'cvv' => 'required|digits:3',
        'total_amount' => 'required|numeric|min:0',
    ]);
    \Log::info('Processing payment', ['total_amount' => $request->total_amount]);

    $bookingId = session('booking_id');
    $booking = Booking::find($bookingId);

    if (!$booking) {
        return redirect()->back()->with('error', 'Booking not found.');
    }

    // Update seat status to "sold"
    $selectedSeats = session('selected_seats');
    Seat::whereIn('id', $selectedSeats)->update([
        'status' => 'sold',
        'is_available' => 0, // Mark as unavailable
    ]);

    // Store payment details
    Payment::create([
        'booking_id' => $booking->id,
        'user_id' => auth()->id(),
        'amount' => $request->total_amount,
        'payment_method' => $request->payment_method,
        'status' => 'successful',
    ]);    

    // Update the booking status to "confirmed"
    $booking->update(['status' => 'confirmed']);

    return redirect()->route('ticket.payment')->with('status', 'success');
}

    
        public function createBooking(Request $request)
    {
        $timedate = session('timedate');
        $selectedSeats = session('selected_seats');

        if (!$timedate || !$selectedSeats) {
            return redirect()->route('ticket.timedate')->with('error', 'Missing booking data.');
        }

        // Fetch the related show
        $show = \App\Models\Show::where('date', $timedate['date'])
            ->where('slot', $timedate['slot'])
            ->firstOrFail();

        // Create a new booking
        $booking = \App\Models\Booking::create([
            'user_id' => auth()->id(),
            'show_id' => $show->id,
            'booking_date' => $timedate['date'],
            'slot' => $timedate['slot'],
            'adults' => $timedate['adults'],
            'children' => $timedate['children'],
            'status' => 'pending',
        ]);

        // Attach selected seats to the booking
        foreach ($selectedSeats as $seatId) {
            \App\Models\Seat::where('id', $seatId)->update(['status' => 'sold']);
            $booking->seats()->attach($seatId);
        }

        // Store the booking ID in the session for the payment step
        session()->put('booking_id', $booking->id);

        return redirect()->route('ticket.payment')->with('success', 'Booking created. Proceed to payment.');
    }

        public function payment()
    {
        $bookingId = session('booking_id');

        if (!$bookingId) {
            return redirect()->route('ticket.timedate')->with('error', 'No booking found. Please start over.');
        }

        $booking = Booking::find($bookingId);

        if (!$booking) {
            return redirect()->route('ticket.timedate')->with('error', 'Booking not found.');
        }

        // Calculate total amount
        $adultPrice = 50.00;
        $childPrice = 25.00;
        $totalAmount = ($booking->adults * $adultPrice) + ($booking->children * $childPrice);

        return view('ticket.payment', compact('booking', 'totalAmount'));
    }

    
    public function cancelPayment()
{
    // Retrieve selected seats from session
    $selectedSeats = session('selected_seats');

    if ($selectedSeats) {
        // Revert seat status to "available"
        Seat::whereIn('id', $selectedSeats)->update([
            'status' => 'available',
            'is_available' => 1, // Mark the seat as available
        ]);

        // Clear the selected seats from the session
        session()->forget('selected_seats');
    }

    // Update booking status to "canceled"
    Booking::where('id', session('booking_id'))->update(['status' => 'canceled']);

    return redirect()->route('ticket.timedate')->with('status', 'cancel');
}

    
    


}
