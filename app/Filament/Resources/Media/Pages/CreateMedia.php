<?php

namespace App\Filament\Resources\Media\Pages;

use App\Filament\Resources\Media\MediaResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateMedia extends CreateRecord
{
    protected static string $resource = MediaResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $images = (array) ($data['image'] ?? []);
        unset($data['image']);

        $record = null;

        foreach ($images as $image) {
            $record = static::getModel()::create([
                ...$data,
                'image' => $image,
            ]);
        }

        return $record;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
