@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Show</h2>

    <form action="{{ route('admin.shows.update', $show->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $show->date }}" required>
        </div>

        <div class="mb-3">
            <label for="slot" class="form-label">Slot</label>
            <select name="slot" id="slot" class="form-control" required>
                <option value="morning" {{ $show->slot == 'morning' ? 'selected' : '' }}>Morning</option>
                <option value="afternoon" {{ $show->slot == 'afternoon' ? 'selected' : '' }}>Afternoon</option>
                <option value="evening" {{ $show->slot == 'evening' ? 'selected' : '' }}>Evening</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Show</button>
    </form>
</div>
@endsection
