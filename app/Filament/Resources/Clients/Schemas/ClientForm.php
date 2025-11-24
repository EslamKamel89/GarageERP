<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('car_model_id')
                    ->relationship('carModel', 'name'),
                TextInput::make('name')
                    ->required(),
                TextInput::make('mobile'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                Textarea::make('address')
                    ->columnSpanFull(),
                TextInput::make('chassis_nu'),
                TextInput::make('plate_nu'),
                TextInput::make('odometer')
                    ->numeric(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
