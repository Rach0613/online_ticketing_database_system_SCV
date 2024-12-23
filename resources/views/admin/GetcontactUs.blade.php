@extends('layout')

@section('title', 'Contact Us Submission')

@section('content')
<div class="container">
    <h1>Contact Us Submissions</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
    <!-- Responsive Table -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Uploaded File</th>
                    <th>Submitted At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($submissions as $submission)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $submission->name }}</td>
                        <td>{{ $submission->email }}</td>
                        <td>{{ $submission->contact_number}}</td>
                        <td>{{ $submission->subject }}</td>
                        <td>{{ $submission->description }}</td>
                        <td>
                            @if ($submission->file_path)
                                <a href="{{ asset('storage/' . $submission->file_path) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $submission->file_path) }}" alt="Uploaded File" style="width: 100px; height: auto;">
                                </a>
                            @else
                                No file uploaded
                            @endif
                        </td>                        
                        <td>{{ $submission->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <!-- Delete Button Form -->
                            <form action="{{ route('admin.contact.delete', $submission->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this submission?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No submissions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('show_styles')
<style>
    /* Button styling */
    .btn-custom {
        background-color: #4C1C8C; /* Normal color */
        color: white; /* Text color */
        border: none;
    }

    .btn-custom:hover {
        color: #FFD93D; /* Hover color */
        background-color: #4C1C8C;
    }

    /* Responsive table */
    .table-responsive {
        margin-top: 20px;
    }

    /* Spacing adjustments for mobile */
    @media (max-width: 768px) {
        table th, table td {
            padding: 8px; /* Adjust padding for smaller screens */
        }

        .table img {
            width: 75px; /* Adjust image size for mobile */
        }
    }
</style>
@endpush
