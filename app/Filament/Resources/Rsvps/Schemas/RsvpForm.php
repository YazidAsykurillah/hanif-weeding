<?php

namespace App\Filament\Resources\Rsvps\Schemas;

use Filament\Schemas\Schema;

class RsvpForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('phone_number')
                    ->required()
                    ->tel()
                    ->maxLength(255),
                \Filament\Forms\Components\Toggle::make('is_attending')
                    ->required(),
            ]);
    }
}
