<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event edit</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body>
    <a href="{{ route('event.index') }}">Revenir aux événements</a>
    <h1>Mettre à jour les informations de l'événement </h1>
    <form action="{{ route('event.update', $event->id) }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom de l'événement</label>
            <input type="text" id="name" name="name" placeholder="Nom" value="{{ $event->name }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" placeholder="Description" value="{{ $event->description }}" required>
        </div>
        <div>
            <label for="seats">Places disponibles</label>
            <input type="text" id="seats" name="seats" placeholder="Sièges" value="{{ $event->seats }}" required>
        </div>
        <div>
            <label for="date">Date de l'événement</label>
            <input type="date" id="date" name="date" value="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }}" required>
        </div>
        <div>
            <label for="time">Heure de l'événement</label>
            <input type="time" id="time" name="time" value="{{ \Carbon\Carbon::parse($event->date)->format('H:i') }}" required>
        </div>
        <div>
            <label for="date">Photo de l'événement</label>
            @foreach ($event->images as $image)
            <img src="{{ asset('storage/' . $image->path) }}" alt="Event Image" style="width: 150px; height: auto;">
            @endforeach
            <input type="file" id="attachment" name="attachment" multiple>
        </div>
        <select name="categories[]" multiple>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ in_array($category->id, $event->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
        <button type="submit">Modifier</button>
    </form>
</body>

</html>