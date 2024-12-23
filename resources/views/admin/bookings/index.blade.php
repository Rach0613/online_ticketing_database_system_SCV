@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Bookings</h2>

    <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>User</th>
                <th>Show Date</th>
                <th>Show Slot</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr class="text-center">
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->user->name }}</td>
                <td>{{ $booking->show->date }}</td>
                <td>{{ ucfirst($booking->slot) }}</td>
                <td>{{ ucfirst($booking->status) }}</td>
                <td>
                    <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-info btn-sm">View</a>
                    <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Cancel</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
