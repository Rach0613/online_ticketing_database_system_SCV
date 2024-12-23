@extends('layout')

@section('title', 'User List')

@section('content')
<div class="container">
    <h1>Users Data Information</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Responsive Table Wrapper -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <!-- View Button -->
                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary btn-sm">View</a>
                            <!-- Edit Button -->
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Delete Button -->
                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>
@endsection
