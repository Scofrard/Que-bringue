<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>

<body>
    <h1>Liste des catégories</h1>
    <ul>
        @foreach ($categories as $category)
        <li>{{ $category->name }}</li>
        @endforeach
    </ul>
</body>

</html>