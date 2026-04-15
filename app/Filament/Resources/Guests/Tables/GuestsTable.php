<?php

namespace App\Filament\Resources\Guests\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class GuestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('link')
                    ->state(fn (\App\Models\Guest $record): string => url('/?to=' . rawurlencode(($record->title ? $record->title . ' ' : '') . $record->name)))
                    ->copyable()
                    ->copyMessage('Invitation link copied')
                    ->copyMessageDuration(1500),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                \Filament\Actions\Action::make('send_whatsapp')
                    ->label('Kirim WA')
                    ->icon('heroicon-m-chat-bubble-oval-left-ellipsis')
                    ->color('success')
                    ->url(function (\App\Models\Guest $record): string {
                        $phone = preg_replace('/[^0-9]/', '', (string) $record->phone_number);
                        if (str_starts_with($phone, '0')) {
                            $phone = '62' . substr($phone, 1);
                        }
                        $fullName = ($record->title ? $record->title . ' ' : '') . $record->name;
                        $url = "https://hanif-wedding.my.id/?to=" . rawurlencode($fullName);
                        $message = "Kepada yang terhormat Bapak/Ibu {$fullName}, kami mengundang untuk menghadiri momen bahagia kami dalam acara\n\n{$url}\n\nBesar harapan kami agar Bapak/Ibu {$fullName} untuk dapat menghadiri acara ini, terimakasih.";
                        return "https://wa.me/" . $phone . "?text=" . rawurlencode($message);
                    })
                    ->openUrlInNewTab(),
                \Filament\Actions\Action::make('copy_link')
                    ->label('Copy Link')
                    ->icon('heroicon-m-clipboard-document-check')
                    ->color('success')
                    ->url('#')
                    ->extraAttributes(fn (\App\Models\Guest $record) => [
                        'x-on:click.prevent' => "let t='" . url('/?to=' . rawurlencode(($record->title ? $record->title . ' ' : '') . $record->name)) . "'; if(navigator.clipboard && window.isSecureContext){navigator.clipboard.writeText(t);}else{let i=document.createElement('input');i.value=t;document.body.appendChild(i);i.select();document.execCommand('copy');document.body.removeChild(i);} \$tooltip('Copied!')",
                    ]),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->paginated([10, 25, 50, 100, 'all']);
    }
}
