@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Booking Details</h2>
    <div class="card mt-3">
        <div class="card-header">
            <strong>Booking ID: {{ $booking->id }}</strong>
        </div>
        <div class="card-body">
            <h5>User Information</h5>
            <ul>
                <li><strong>Name:</strong> {{ $booking->user->name }}</li>
                <li><strong>Email:</strong> {{ $booking->user->email }}</li>
            </ul>

            <h5>Show Information</h5>
            <ul>
                <li><strong>Date:</strong> {{ $booking->show->date }}</li>
                <li><strong>Slot:</strong> {{ ucfirst($booking->show->slot) }}</li>
            </ul>

            <h5>Booking Details</h5>
            <ul>
                <li><strong>Adults:</strong> {{ $booking->adults }}</li>
                <li><strong>Children:</strong> {{ $booking->children }}</li>
                <li><strong>Status:</strong> {{ ucfirst($booking->status) }}</li>
                <li><strong>Booking Date:</strong> {{ $booking->booking_date }}</li>
                @if ($booking->status === 'canceled' && $booking->cancellation_reason)
                    <li><strong>Cancellation Reason:</strong> {{ $booking->cancellation_reason }}</li>
                @endif
            </ul>

            <h5>Seat Information</h5>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Row</th>
                        <th>Number</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking->seats as $seat)
                    <tr>
                        <td>{{ $seat->row }}</td>
                        <td>{{ $seat->number }}</td>
                        <td>{{ ucfirst($seat->status) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Update Booking Status -->
            <h5 class="mt-4">Update Booking Status</h5>
            <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="status" class="form-label">Booking Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="canceled" {{ $booking->status === 'canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="cancellation_reason" class="form-label">Cancellation Reason (if canceled)</label>
                    <textarea name="cancellation_reason" id="cancellation_reason" rows="3" class="form-control">{{ $booking->cancellation_reason }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Update Booking</button>
            </form>
        </div>
    </div>
</div>
@endsection
