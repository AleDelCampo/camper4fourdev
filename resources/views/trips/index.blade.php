@extends('layouts.app')

@section('title', 'Trips')

@section('content')
<div class="container">
    <h1 class="mb-4">Your Trips</h1>
    <a href="{{ route('trips.create') }}" class="btn my-btn text-white mb-3">Create New Trip</a>

    @if($trips->isEmpty())
    <p>No trips created yet.</p>
    @else
    <ul class="list-group">
        @foreach($trips as $trip)
        <li class="list-group-item">
            {{ $trip->title }}
        </li>
        @endforeach
    </ul>
    @endif
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