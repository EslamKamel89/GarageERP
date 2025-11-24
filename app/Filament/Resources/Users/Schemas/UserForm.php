<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class UserForm {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('resources.users.fields.name'))
                    ->required()
                    ->prefixIcon(Heroicon::User),
                TextInput::make('email')
                    ->label(__('resources.users.fields.email'))
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->prefixIcon(Heroicon::AtSymbol),
                TextInput::make('password')
                    ->label(__('resources.users.fields.password'))
                    ->password()
                    ->nullable()
                    ->dehydrated(fn($state) => filled($state)),
            ]);
    }
}
