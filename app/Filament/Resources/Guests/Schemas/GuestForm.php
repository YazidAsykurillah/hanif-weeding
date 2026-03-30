<?php

namespace App\Filament\Resources\Guests\Schemas;

use Filament\Schemas\Schema;

class GuestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->maxLength(255),
            ]);
    }
}
