@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <h1>Create Trip</h1>
    <form action="{{ route('trips.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn my-btn text-white">Create Trip</button>
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