<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Seat;
use App\Models\Show;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        // Get sorting parameters from request or set default values
        $direction = $request->input('direction', 'asc'); // Default to ascending

        $bookings = Booking::with(['user', 'show'])
        ->join('shows', 'bookings.show_id', '=', 'shows.id') // Join to access 'date'
            ->orderBy('shows.date', $direction) // Sort by date
            ->orderByRaw("FIELD(shows.slot, 'MORNING', 'AFTERNOON', 'EVENING')") // Sort by slot
            ->select('bookings.*') // Select the bookings table
        ->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::with(['user', 'show', 'seats'])->findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        
        // Revert seat availability if booking is canceled
        foreach ($booking->seats as $seat) {
            $seat->update(['status' => 'available']);
        }

        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking canceled successfully!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,canceled',
            'cancellation_reason' => 'nullable|string|max:255',
        ]);

        $booking = Booking::findOrFail($id);

        if ($validated['status'] === 'canceled') {
            foreach ($booking->seats as $seat) {
                $seat->update(['status' => 'available']);
            }
        }

        $booking->update($validated);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'show_id' => 'required|exists:shows,id',
            'user_id' => 'required|exists:users,id',
            'seats' => 'required|array',
            'seats.*' => 'exists:seats,id',
        ]);

        $show = Show::findOrFail($validated['show_id']);

        $booking = Booking::create([
            'user_id' => $validated['user_id'],
            'show_id' => $validated['show_id'],
            'booking_date' => now(),
            'slot' => $show->slot,
            'adults' => $request->adults,
            'children' => $request->children,
            'status' => 'pending',
        ]);

        $availableSeats = Seat::whereIn('id', $validated['seats'])->where('status', 'available')->get();

        foreach ($availableSeats as $seat) {
            $seat->update(['status' => 'sold']);
            $booking->seats()->attach($seat->id);
        }

        if ($availableSeats->isEmpty()) {
            return redirect()->back()->with('phperror', 'Selected seats are no longer available.');
        }

        return redirect()->route('admin.bookings.index')->with('success', 'Booking created successfully!');
    }
}
