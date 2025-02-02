<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Resources\Pages\EditRecord;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['date'] = $data['date_only'] . ' ' . $data['time_only'];
        unset($data['date_only'], $data['time_only']);
        return $data;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (isset($data['date']) && !empty($data['date'])) {
            try {
                // Utilisez le format complet 'Y-m-d H:i:s' pour gérer la date et l'heure
                $datetime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data['date']);
                $data['date_only'] = $datetime->format('Y-m-d');
                $data['time_only'] = $datetime->format('H:i');
            } catch (\Exception $e) {
                // Si mauvais format de date, vider les champs
                $data['date_only'] = null;
                $data['time_only'] = null;
            }
        } else {
            $data['date_only'] = null;
            $data['time_only'] = null;
        }

        // Charger les images de l'event
        $data['newImages'] = $this->record->images->pluck('path')->toArray();

        // Charger la localisation de l'event
        if ($this->record->localisation) {
            $data['full_address'] = $this->record->localisation->full_address;
            $data['latitude'] = $this->record->localisation->latitude;
            $data['longitude'] = $this->record->localisation->longitude;
        }

        return $data;
    }


    protected function afterSave(): void
    {
        $existingImages = $this->record->images->pluck('path')->toArray();

        if (!empty($this->data['newImages'])) {
            // Supprimer les images qui ne sont plus présentes
            foreach ($existingImages as $imagePath) {
                if (!in_array($imagePath, $this->data['newImages'])) {
                    $this->record->images()->where('path', $imagePath)->delete();
                }
            }
            // Ajouter les nouvelles images uniquement si elles n'existait pas
            foreach ($this->data['newImages'] as $file) {
                if (!in_array($file, $existingImages)) {
                    $this->record->images()->create([
                        'path' => $file,
                    ]);
                }
            }
        }

        if (!empty($this->data['full_address']) && isset($this->data['latitude']) && isset($this->data['longitude'])) {
            // Vérifier la localisation prééxistante
            $localisation = $this->record->localisation;

            // Si une localisation existe déjà, on la met à jour
            if ($localisation) {
                $localisation->update([
                    'full_address' => $this->data['full_address'],
                    'latitude' => $this->data['latitude'],
                    'longitude' => $this->data['longitude'],
                ]);
            } else {
                // Sinon, créer une nouvelle localisation
                $this->record->localisation()->create([
                    'full_address' => $this->data['full_address'],
                    'latitude' => $this->data['latitude'],
                    'longitude' => $this->data['longitude'],
                ]);
            }
        }
    }
}
