<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nom de l\'événement')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('description')
                ->label('Description')
                ->required(),

            Forms\Components\TextInput::make('seats')
                ->label('Places disponibles')
                ->required()
                ->numeric()
                ->minValue(1),

            Forms\Components\DatePicker::make('date_only')
                ->label('Date')
                ->required()
                ->default(fn($record) => $record ? $record->date->format('Y-m-d') : null),

            Forms\Components\TimePicker::make('time_only')
                ->label('Heure')
                ->required()
                ->default(fn($record) => $record ? $record->date->format('H:i') : null),

            Forms\Components\MultiSelect::make('categories')
                ->label('Catégories')
                ->relationship('categories', 'name'),

            Forms\Components\FileUpload::make('newImages')
                ->label('Ajouter des images')
                ->multiple(),
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\ImageColumn::make('images.path')
                    ->label('Images')
                    ->getStateUsing(function ($record) {
                        return optional($record->images->first())->path;
                    }),

                Tables\Columns\TextColumn::make('name')
                    ->label('Événement')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(30)
                    ->sortable(),

                Tables\Columns\TextColumn::make('seats')
                    ->label('Places')
                    ->sortable(),

                Tables\Columns\TextColumn::make('date')
                    ->label('Date et heure')
                    ->sortable()
                    ->dateTime('d/m/Y H:i'),

                Tables\Columns\TextColumn::make('categories.name')
                    ->label('Catégories')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('localisation.full_address')
                    ->label('Adresse complète')
                    ->sortable()
                    ->searchable()
                    ->default('Non renseignée'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->sortable()
                    ->dateTime('d/m/Y'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Modifié le')
                    ->sortable()
                    ->dateTime('d/m/Y'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
