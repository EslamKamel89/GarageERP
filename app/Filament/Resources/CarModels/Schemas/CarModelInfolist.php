<?php

namespace App\Filament\Resources\CarModels\Schemas;

use App\Models\CarModel;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CarModelInfolist {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextEntry::make('name')->label('الاسم'),

            ]);
    }
}
