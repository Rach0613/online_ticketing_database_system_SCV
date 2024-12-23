<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class processPayment extends Model
{
    public function processPayment(Request $request)
{
    $validated = $request->validate([
        'card_name' => 'required|string|max:255',
        'card_number' => 'required|digits:16',
        'expiry_date' => 'required|regex:/^(0[1-9]|1[0-2])\/\d{2}$/',
        'cvv' => 'required|digits:3',
    ]);

    // Retrieve the booking ID from the session
    $bookingId = session('booking_id');
    $booking = \App\Models\Booking::findOrFail($bookingId);

    // Create a payment record
    \App\Models\Payment::create([
        'booking_id' => $booking->id,
        'amount' => ($booking->adults * 50) + ($booking->children * 25),
        'payment_method' => $request->payment_method,
        'status' => 'successful',
    ]);

    // Update the booking status
    $booking->update(['status' => 'confirmed']);

    // Clear session data
    session()->forget(['timedate', 'selected_seats', 'booking_id']);

    return redirect()->route('account.dashboard')->with('success', 'Payment successful!');
}

}
