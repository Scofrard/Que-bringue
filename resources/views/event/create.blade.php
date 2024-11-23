<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event create</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body>
    <form action="{{ route('event.store') }}" method="POST">
        @csrf
        <input type="text" id="name" name="name" placeholder="Nom" required>
        <input type="text" id="description" name="description" placeholder="Description" required>
        <input type="text" id="seats" name="seats" placeholder="Sièges" required>
        <input type="text" id="date" name="date" placeholder="Dates" required>
        <button type="submit">Ajouter</button>
    </form>
</body>

</html>