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
        if (isset($data['date'])) {
            $datetime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data['date']);
            $data['date_only'] = $datetime->format('Y-m-d');
            $data['time_only'] = $datetime->format('H:i');
        }
        return $data;
    }

    protected function afterSave(): void
    {
        if (!empty($this->data['newImages'])) {
            foreach ($this->data['newImages'] as $file) {
                $this->record->images()->create([
                    'path' => $file,
                ]);
            }
        }

        if (!empty($this->data['full_address']) && isset($this->data['latitude']) && isset($this->data['longitude'])) {
            // Vérifier si une localisation existe déjà pour cet événement
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
