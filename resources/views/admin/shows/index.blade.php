@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Shows</h2>
    {{-- Display Success Message --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- Display Validation Errors --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <a href="{{ route('admin.shows.create') }}" class="btn btn-primary mb-3">Add New Show</a>

    <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Date</th>
                <th>Slot</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shows as $show)
            <tr class="text-center">
                <td>{{ $show->id }}</td>
                <td>{{ $show->date }}</td>
                <td>{{ ucfirst($show->slot) }}</td>
                <td>
                    <a href="{{ route('admin.shows.edit', $show->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.shows.destroy', $show->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.querySelector('.alert-success');
        if (alert) {
            setTimeout(() => {
                alert.style.display = 'none';
            }, 3000); // Hide after 3 seconds
        }
    });
</script>
@endsection
