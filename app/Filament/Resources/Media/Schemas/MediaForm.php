<?php

namespace App\Filament\Resources\Media\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class MediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category')
                    ->options([
                        'moment-of-together' => 'Moment of Together',
                        'other' => 'Other',
                    ])
                    ->default('other')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->multiple(fn (string $operation): bool => $operation === 'create')
                    ->maxFiles(5)
                    ->disk('public')
                    ->directory('media')
                    ->required(),
            ]);
    }
}
