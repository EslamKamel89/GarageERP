<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductForm {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('قسم')
                    ->relationship('category', 'name'),
                TextInput::make('code')
                    ->label('الكود')
                    ->required(),
                TextInput::make('name')
                    ->label('الاسم')
                    ->required(),
                Textarea::make('description')
                    ->label('الوصف')
                    ->columnSpanFull(),
                TextInput::make('buy_price')
                    ->label('سعر الشراء')
                    ->visible(auth()->user()->email == 'abdo@cardoctor.com')
                    ->default(0)
                    ->numeric()
                    ->prefix('$')
                    ->dehydrated(true)
                    ->dehydrateStateUsing(fn($state) => $state ?? 0),
                TextInput::make('sell_price')
                    ->label('سعر البيع')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('quantity')
                    ->label('العدد')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('min_stock_quantity')
                    ->label('حد المخزون الأدنى')
                    ->required()
                    ->numeric()
                    ->default(0),
                Textarea::make('notes')
                    ->label('ملاحظات')
                    ->columnSpanFull(),
            ]);
    }
}
