@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center text-white py-5 my-bg">
        <div class="container">
            <h1 class="display-4">Welcome to MyTrips</h1>
            <p class="lead">Plan and share your amazing trips with ease!!</p>
        </div>
    </div>

    <div class="container mt-5 my-light-bg">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Plan Your Trip</h5>
                        <p class="card-text">Create detailed itineraries and organize your adventures.</p>
                        <a href="{{ route('trips.create') }}" class="btn my-btn text-white">Create Trip</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Create a Day</h5>
                        <p class="card-text">Add a new day to your trip and plan your itinerary.</p>
                        <a href="{{ route('days.create') }}" class="btn my-btn text-white">Create Day</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Add a Stop</h5>
                        <p class="card-text">Include your favourite stops and landmarks in your itinerary.</p>
                        <a href="{{ route('stops.create') }}" class="btn my-btn text-white">Create Stop</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 mt-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Manage Days and Stops</h5>
                        <p class="card-text">View and manage your days and stops.</p>
                        <a href="{{ route('days.index') }}" class="btn my-btn text-white">View Days</a>
                        <a href="{{ route('stops.index') }}" class="btn my-btn text-white ml-2">View Stops</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
