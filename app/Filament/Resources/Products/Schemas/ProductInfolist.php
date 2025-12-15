<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Product;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductInfolist {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextEntry::make('category.name')
                    ->label('قسم')

                    ->placeholder('-'),
                TextEntry::make('code')->label('الكود'),
                TextEntry::make('name')->label('الاسم'),
                TextEntry::make('description')
                    ->label('الوصف')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('buy_price')
                    ->label('سعر الشراء')
                    ->hidden(auth()->user()->email != 'abdo@cardoctor.com')
                    ->money('EGP'),
                TextEntry::make('sell_price')
                    ->label('سعر البيع')
                    ->money('EGP'),
                TextEntry::make('quantity')
                    ->label('العدد')
                    ->numeric(),
                TextEntry::make('min_stock_quantity')
                    ->label('حد المخزون الأدنى')
                    ->numeric(),
                TextEntry::make('notes')
                    ->label('ملاحظات')
                    ->placeholder('-')
                    ->columnSpanFull(),

            ]);
    }
}
