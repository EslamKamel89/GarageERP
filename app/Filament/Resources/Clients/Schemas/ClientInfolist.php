<?php

namespace App\Filament\Resources\Clients\Schemas;

use App\Models\Client;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClientInfolist {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextEntry::make('carModel.name')
                    ->label('طراز السيارة')
                    ->placeholder('-'),
                TextEntry::make('name')
                    ->label('الاسم'),
                TextEntry::make('mobile')
                    ->label('الهاتف')
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label('البريد الإلكتروني')
                    ->placeholder('-'),
                TextEntry::make('address')
                    ->label('العنوان ')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('chassis_nu')
                    ->label('رقم الشاسية')
                    ->placeholder('-'),
                TextEntry::make('plate_nu')
                    ->label('عداد المسافات')
                    ->placeholder('-'),
                TextEntry::make('odometer')
                    ->numeric()
                    ->label('عداد المسافات')
                    ->placeholder('-'),
                TextEntry::make('notes')
                    ->label('ملاحظات')
                    ->placeholder('-')
                    ->columnSpanFull(),

            ]);
    }
}
