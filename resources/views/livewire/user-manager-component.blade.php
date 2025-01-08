<div>
    <h2 class="text-xl font-bold">{{ $isEditMode ? 'Modifier l’utilisateur' : 'Créer un utilisateur' }}</h2>

    <form wire:submit.prevent="{{ $isEditMode ? 'updateUser' : 'createUser' }}">
        <div>
            <label>Nom</label>
            <input type="text" wire:model="name" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" wire:model="email" required>
        </div>
        @if(!$isEditMode)
        <div>
            <label>Mot de passe</label>
            <input type="password" wire:model="password" required>
        </div>
        @endif
        <button type="submit">{{ $isEditMode ? 'Mettre à jour' : 'Créer' }}</button>
        <button type="button" wire:click="resetForm">Annuler</button>
    </form>

    <hr>

    <h2 class="text-xl font-bold mt-4">Liste des utilisateurs</h2>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <button wire:click="editUser({{ $user->id }})">Modifier</button>
                    <button wire:click="deleteUser({{ $user->id }})">Supprimer</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>