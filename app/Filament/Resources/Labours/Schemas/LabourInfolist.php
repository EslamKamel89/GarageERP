<?php

namespace App\Filament\Resources\Labours\Schemas;

use App\Models\Labour;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LabourInfolist {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextEntry::make('name_ar')
                    ->label('الاسم '),
                TextEntry::make('base_fee')
                    ->label('الرسوم الأساسية')
                    ->money('EGP'),
                IconEntry::make('is_active')
                    ->label('نشط')
                    ->boolean()
            ]);
    }
}
