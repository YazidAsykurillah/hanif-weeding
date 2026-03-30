<?php

namespace App\Filament\Resources\Rsvps\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class RsvpsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                \Filament\Tables\Columns\IconColumn::make('is_attending')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
