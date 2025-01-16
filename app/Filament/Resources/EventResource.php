<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Tapp\FilamentGoogleAutocomplete\Forms\Components\GoogleAutocomplete;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationLabel = 'Événements';

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nom de l\'événement')
                ->required(),

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
                ->relationship('categories', 'name')
                ->required(),

            Forms\Components\FileUpload::make('newImages')
                ->label('Ajouter des images')
                ->multiple()
                ->image()
                ->directory('event_images')
                ->maxSize(1024)
                ->required()
                ->afterStateUpdated(function ($state, callable $set) {
                    // Ici tu peux gérer les images déjà présentes si nécessaire
                    if ($state) {
                        // Le champ 'newImages' contiendra les images existantes dans un tableau
                        $set('newImages', $state);
                    }
                })
                ->afterStateHydrated(function ($state, callable $set) {
                    // Hydrate avec les images existantes lors de la récupération des données
                    if ($state) {
                        $set('newImages', $state);  // Assurez-vous que l'état soit bien défini pour l'édition
                    }
                }),

            GoogleAutocomplete::make('google_search')
                ->label('Adresse complète')
                ->countries(['BE'])
                ->language('fr')
                ->withFields([
                    Forms\Components\TextInput::make('full_address')
                        ->label('Adresse complète')
                        ->extraInputAttributes([
                            'data-google-field' => '{street_number} {route}, {sublocality_level_1}, {country}',
                        ]),

                    Forms\Components\TextInput::make('latitude')
                        ->label('Latitude')
                        ->extraInputAttributes([
                            'data-google-field' => '{latitude}',
                        ])
                        ->disabled(),

                    Forms\Components\TextInput::make('longitude')
                        ->label('Longitude')
                        ->extraInputAttributes([
                            'data-google-field' => '{longitude}',
                        ])
                        ->disabled(),
                ]),
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
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Modifié le')
                    ->sortable(),
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
