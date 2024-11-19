<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    @foreach ($users as $user)
    <ul>
        <li>id : {{ $user->id }}</li>
        <li>name : {{ $user->name }}</li>
        <li>email : {{ $user->email }}</li>
    </ul>
    <p>name : {{ $user->name }}</p>
    <a href="{{ route('user.show', $user->id) }} ">Détails de l'utilisateur</a>
    @endforeach
</body>

</html>