<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['date'] = $data['date_only'] . ' ' . $data['time_only'];
        unset($data['date_only'], $data['time_only']);
        return $data;
    }

    protected function afterCreate(): void
    {
        if (!empty($this->data['newImages'])) {
            foreach ($this->data['newImages'] as $file) {
                $this->record->images()->create([
                    'path' => $file,
                ]);
            }
        }
        if (!empty($this->data['full_address']) && isset($this->data['latitude']) && isset($this->data['longitude'])) {
            $this->record->localisation()->create([
                'full_address' => $this->data['full_address'],
                'latitude' => $this->data['latitude'],
                'longitude' => $this->data['longitude'],
            ]);
        }
    }
}
