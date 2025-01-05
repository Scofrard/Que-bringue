<?php

namespace App\Filament\Resources;

use App\Filament\Pages\ManageUsers; // Importation correcte
use App\Models\User;
use Filament\Resources\Resource;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function getPages(): array
    {
        return [
            'index' => ManageUsers::route('/'),
        ];
    }
}
