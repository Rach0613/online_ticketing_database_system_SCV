@extends('layout')

@section('title', 'View User')

@section('content')
<div class="container">
    <h1>View User: {{ $user->name }}</h1>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Contact Number</th>
                <td>{{ $user->phone }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>{{ $user->role }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
        </table>
    </div>

    <!-- Back to Users List Button -->
    <div class="mb-3">
        <a href="{{ route('admin.users.index') }}" class="btn btn-custom">Back to Users List</a>
    </div>
</div>
@endsection

@push('show_styles')
<style>
    .btn-custom {
        background-color: #4C1C8C; /* Normal color */
        color: white; /* Text color */
        border: none;
    }

    .btn-custom:hover {
        color: #FFD93D; /* Hover color */
        background-color: #4C1C8C;
    }

    /* Styling for table responsiveness */
    .table-responsive {
        margin-top: 20px;
    }

    /* Additional spacing for smaller devices */
    .mt-3 {
        margin-top: 1rem;
    }
</style>
@endpush
