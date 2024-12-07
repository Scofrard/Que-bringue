<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event create</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="text" id="name" name="name" placeholder="Nom" required>
        <input type="text" id="description" name="description" placeholder="Description" required>
        <input type="text" id="seats" name="seats" placeholder="Sièges" required>
        <input type="text" id="date" name="date" placeholder="Date" required>
        <input type="file" id="attachment" name="attachment">
        <select name="categories[]" multiple>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="mb-3">
            <label for="address-input" class="form-label">Search Address , City or Country</label>
            <input type="text" class="form-control map-input" id="address-input" name="address-input">
        </div>
        <hr>
        <div id="address-map-container" style="width: 100%; height:400px;"> </div>
        <div style="width: 100%; height: 100%" id="address-map"> </div>
        <div class="mb-3">
            <label for="address-latitude" class="form-label">Latitude</label>
            <input type="text" class="form-control" id="address-latitude" name="address-latitude">
        </div>
        <div class="mb-3">
            <label for="address-longitude" class="form-label">Longitude</label>
            <input type="text" class="form-control" id="address-longitude" name="address-longitude">
        </div>
        <button type="submit">Créer</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoEBQqSJKJORH9pB2cr1TWAxOnqUYX8hQ&libraries=places&callback=initialize" async defer> </script>
    <script type="text/javascript" src="/js/mapinput.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>