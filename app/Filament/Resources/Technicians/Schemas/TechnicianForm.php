<?php

namespace App\Filament\Resources\Technicians\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TechnicianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('mobile'),
                Textarea::make('notes')
                    ->columnSpanFull(),
                Toggle::make('active')
                    ->required(),
            ]);
    }
}
