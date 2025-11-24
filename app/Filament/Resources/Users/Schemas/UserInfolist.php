<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class UserInfolist {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label(__('resources.users.fields.name'))
                    ->icon(Heroicon::User),
                TextEntry::make('email')
                    ->label(__('resources.users.fields.email'))
                    ->icon(Heroicon::AtSymbol)
                    ->copyable(),
                TextEntry::make('created_at')
                    ->label(__('resources.users.fields.created_at'))
                    ->dateTime()
                    ->placeholder('-')
                    ->icon(Heroicon::Calendar),
            ]);
    }
}
