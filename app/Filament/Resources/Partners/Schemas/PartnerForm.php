<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Schemas\Schema;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Select::make('type')
                    ->options([
                        'bride' => 'Bride',
                        'groom' => 'Groom',
                    ])
                    ->required(),
                \Filament\Forms\Components\TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('nickname')
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('father_name')
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('mother_name')
                    ->maxLength(255),
                \Filament\Forms\Components\Textarea::make('address')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                \Filament\Forms\Components\FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('partners')
                    ->nullable(),
            ]);
    }
}
