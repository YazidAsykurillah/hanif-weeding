<?php

namespace App\Filament\Resources\Agendas\Schemas;

use Filament\Schemas\Schema;

class AgendaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Event Details')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\DatePicker::make('date')
                            ->required(),
                        \Filament\Forms\Components\TimePicker::make('start_time')
                            ->required(),
                        \Filament\Forms\Components\TimePicker::make('end_time'),
                    ])->columns(2),
                \Filament\Schemas\Components\Section::make('Venue Information')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('location')
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\Textarea::make('address')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        \Filament\Forms\Components\TextInput::make('google_maps_url')
                            ->url()
                            ->helperText('Links the address to this location')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])->columns(1),
                \Filament\Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                \Filament\Forms\Components\Toggle::make('is_active')
                    ->default(true)
                    ->required(),
                \Filament\Forms\Components\Toggle::make('is_main_agenda')
                    ->default(false)
                    ->required(),
            ]);
    }
}
