<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea un Nuovo Elemento</title>
</head>
<body>
    <h1>Crea un Nuovo Elemento</h1>
    <form action="{{ route('trips.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" name="name" required>
        
        <label for="date">Data:</label>
        <input type="date" name="date" required>
        
        <label for="image">Immagine:</label>
        <input type="file" name="image" accept="image/*" required>
        
        <button type="submit">Crea</button>
    </form>
</body>
</html>
