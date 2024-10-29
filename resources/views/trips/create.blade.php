@extends('layouts.app')
@section('content')
<h1>Crea un Nuovo Elemento</h1>
<form action="{{ route('trips.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Nome:</label>
    <input type="text" name="name" required>

    <label for="description">Descrizione:</label>
    <input type="text" name="description" required>

    <label for="image">Immagine:</label>
    <input type="file" name="image" accept="image/*" required>

    <button type="submit">Crea</button>
</form>
@endsection