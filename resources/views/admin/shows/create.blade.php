@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add Show</h2>
    {{-- Display Session Error Message --}}
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
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


    <form action="{{ route('admin.shows.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="slot" class="form-label">Slot</label>
            <select name="slot" id="slot" class="form-control" required>
                <option value="morning">Morning</option>
                <option value="afternoon">Afternoon</option>
                <option value="evening">Evening</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add Show</button>
    </form>
</div>
@endsection
