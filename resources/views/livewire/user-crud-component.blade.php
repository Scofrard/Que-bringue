<div>
    <h2>Gestion des Utilisateurs</h2>
    <form wire:submit.prevent="{{ $userId ? 'updateUser' : 'createUser' }}">
        <input type="text" wire:model="name" placeholder="Nom">
        @error('name') <span>{{ $message }}</span> @enderror

        <input type="email" wire:model="email" placeholder="Email">
        @error('email') <span>{{ $message }}</span> @enderror

        <input type="password" wire:model="password" placeholder="Mot de passe">
        @error('password') <span>{{ $message }}</span> @enderror

        <button type="submit">{{ $userId ? 'Modifier' : 'Créer' }}</button>
    </form>
    <ul>
        @foreach($users as $user)
        <li>
            {{ $user->name }} ({{ $user->email }})
            <button wire:click="editUser({{ $user->id }})">Modifier</button>
            <button wire:click="deleteUser({{ $user->id }})">Supprimer</button>
        </li>
        @endforeach
    </ul>
</div>