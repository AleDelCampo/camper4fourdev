<!DOCTYPE html>
<html lang="en">
<div class="container">
    <h1>Benvenuto nella nostra applicazione!</h1>
    <p>Questo è il contenuto della pagina di benvenuto.</p>

    <div class="mt-4">
        <a href="{{ route('trips.index') }}" class="btn btn-primary">Visualizza Trips</a>
        <a href="{{ route('trips.create') }}" class="btn btn-success">Crea un Trip</a>
    </div>
</div>
</html>
