@extends('layouts.app')

@section('title', 'Stops')

@section('content')

<div class="container">
    <h1 class="mb-4">Your Stops</h1>
    <a href="{{ route('stops.create') }}" class="btn my-btn text-white mb-3">Create New Stop</a>
    @if($stops->isEmpty())
    <p>No stops created yet.</p>
    @else
    <ul class="list-group">
        @foreach($stops as $stop)
        <li class="list-group-item">
            {{ $stop->location }}
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