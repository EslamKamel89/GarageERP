<?php

namespace App\Filament\Resources\Clients\Schemas;

use App\Models\Client;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClientInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('carModel.name')
                    ->label('Car model')
                    ->placeholder('-'),
                TextEntry::make('name'),
                TextEntry::make('mobile')
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('address')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('chassis_nu')
                    ->placeholder('-'),
                TextEntry::make('plate_nu')
                    ->placeholder('-'),
                TextEntry::make('odometer')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Client $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
