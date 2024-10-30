@extends('layouts.app')

@section('title', 'Days')

@section('content')

<div class="container">
    <h1 class="mb-4">Your Days</h1>
    <a href="{{ route('days.create') }}" class="btn my-btn text-white mb-3">Create New Day</a>

    @if($days->isEmpty())
    <p>No days created yet.</p>
    @else
    <ul class="list-group">
        @foreach($days as $day)
        <li class="list-group-item">
            {{ $day->date }}
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