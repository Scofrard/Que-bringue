<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nom')
                ->required(),

            Forms\Components\TextInput::make('firstname')
                ->label('Prénom')
                ->required(),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),

            Forms\Components\TextInput::make('phone')
                ->label('Tel')
                ->email()
                ->required(),

            Forms\Components\TextInput::make('login')
                ->label('Login')
                ->email()
                ->required(),

            Forms\Components\TextInput::make('password')
                ->label('Mot de passe')
                ->password()
                ->required()
                ->dehydrateStateUsing(fn($state) => bcrypt($state)),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Nom')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('firstname')->label('Prénom')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('phone')->label('Tel')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Créé le')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->label('Modifié le')->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
