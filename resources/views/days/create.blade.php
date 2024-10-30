@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <h1>Create New Day</h1>
    <form action="{{ route('days.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="trip_id">Trip</label>
            <select class="form-control" id="trip_id" name="trip_id" required>
                @foreach($trips as $trip)
                <option value="{{ $trip->id }}">{{ $trip->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <button type="submit" class="btn my-btn text-white mt-2">Create Day</button>
    </form>
</div>

<style scoped>
    .my-nav-bg {
        background-color: #4a5d5e;
    }

    .my-bg {
        background-color: #d2dbc8;
    }

    .my-light-bg {
        background-color: #f8f9fa;
    }

    .my-btn {
        background-color: #4a5d5e;
    }

    .my-btn:hover {
        background-color: #4a5d5e;
    }
</style>
@endsection