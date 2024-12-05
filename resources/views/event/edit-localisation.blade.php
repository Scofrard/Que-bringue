<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier la localisation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Modifier l'adresse pour {{ $event->name }}</h1>

    <form action="{{ route('event.localisation.update', $event->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="address-input" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="address-input" name="address-input" value="{{ old('address-input', $event->localisation->full_address ?? '') }}" required>
        </div>

        <div id="address-map-container" style="width: 100%; height:400px;"> </div>
        <div style="width: 100%; height: 100%" id="address-map"> </div>

        <div class="mb-3">
            <label for="address-latitude" class="form-label">Latitude</label>
            <input type="text" class="form-control" id="address-latitude" name="address-latitude" value="{{ old('address-latitude', $event->localisation->latitude ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="address-longitude" class="form-label">Longitude</label>
            <input type="text" class="form-control" id="address-longitude" name="address-longitude" value="{{ old('address-longitude', $event->localisation->longitude ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoEBQqSJKJORH9pB2cr1TWAxOnqUYX8hW&libraries=places&callback=initialize" async defer></script>
    <script type="text/javascript" src="/js/mapinput.js"></script>
</body>

</html>