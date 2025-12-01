<?php

namespace App\Filament\Resources\Labours\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LabourForm {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('name_ar')
                    ->label('الاسم ')
                    ->required(),
                TextInput::make('base_fee')
                    ->label('الرسوم الأساسية')
                    ->required()
                    ->numeric(),
                Toggle::make('is_active')
                    ->label('نشط')
                    ->required(),
            ]);
    }
}
