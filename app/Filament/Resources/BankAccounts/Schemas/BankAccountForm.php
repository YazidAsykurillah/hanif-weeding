<?php

namespace App\Filament\Resources\BankAccounts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BankAccountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('bank_name')
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\FileUpload::make('image')
                    ->label('Bank logo')
                    ->image()
                    ->disk('public')
                    ->directory('bank_logos')
                    ->visibility('public')
                    ->nullable(),
                \Filament\Forms\Components\TextInput::make('bank_account_name')
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('account_number')
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\Toggle::make('is_active')
                    ->default(true)
                    ->required(),
            ]);
    }
}
