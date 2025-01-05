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
            \Filament\Forms\Components\View::make('livewire.event-edit-form'),
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
