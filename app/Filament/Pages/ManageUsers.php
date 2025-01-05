<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ManageUsers extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static string $view = 'filament.pages.manage-users';
    protected static ?string $navigationLabel = 'Utilisateurs';
}
