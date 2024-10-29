@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Lista dei Trips</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data</th>
                <th>Immagine</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trips as $trip)
            <tr>
                <td>{{ $trip->id }}</td>
                <td>{{ $trip->name }}</td>
                <td>{{ $trip->description }}</td>
                <td>
                    <img src="{{ Storage::url($trip->image) }}" alt="Image" width="100">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
