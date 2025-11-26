<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ClientForm {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                Select::make('car_model_id')
                    ->label('طراز السيارة')
                    ->relationship('carModel', 'name'),
                TextInput::make('name')
                    ->label('الاسم')
                    ->required(),
                TextInput::make('mobile')
                    ->label('الهاتف'),
                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email(),
                Textarea::make('address')
                    ->label('العنوان ')
                    ->columnSpanFull(),
                TextInput::make('chassis_nu')
                    ->label('رقم الشاسية'),
                TextInput::make('plate_nu')
                    ->label('رقم اللوحة'),
                TextInput::make('odometer')
                    ->numeric()
                    ->label('عداد المسافات'),
                Textarea::make('notes')
                    ->label('ملاحظات')
                    ->columnSpanFull(),
            ]);
    }
}
