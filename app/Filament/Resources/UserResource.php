<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('firstname')
                ->label('Prénom')
                ->required(),

            Forms\Components\TextInput::make('name')
                ->label('Nom')
                ->required(),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),

            Forms\Components\TextInput::make('phone')
                ->label('Téléphone')
                ->tel()
                ->required(),

            Forms\Components\TextInput::make('password')
                ->label('Mot de passe')
                ->password()
                ->required()
                ->dehydrateStateUsing(fn($state) => bcrypt($state))
                ->visibleOn('create'),

            Forms\Components\Checkbox::make('is_admin')
                ->label('Administrateur ?')
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('firstname')->label('Prénom')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('name')->label('Nom')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('email')->label('Email')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('phone')->label('Tél')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('is_admin')->label('Administrateur')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('created_at')->label('Créé le')->dateTime(),
            Tables\Columns\TextColumn::make('updated_at')->label('Mis à jour le')->dateTime(),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
