@extends('layout')

@section('title', 'Edit User')

@section('content')
<div class="container">
    <h1>Edit User: {{ $user->name }}</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Row for Name and Email fields -->
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                </div>
            </div>

            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
            </div>
        </div>

        <!-- Row for Contact Number and Role fields -->
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" class="form-control" name="contact_number" value="{{ old('phone', $user->phone) }}">
                </div>
            </div>

            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" required>
                        <option value="customer" {{ old('role', $user->role) == 'customer' ? 'selected' : '' }}>Customer</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-custom mt-3" style="background-color: #4CAF50">Update User</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-custom mt-3">Back to Users List</a>
        </div>
    </form>
</div>
@endsection

@push('edit_styles')
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

    .form-group {
        margin-bottom: 1.5rem;
    }
</style>
@endpush
