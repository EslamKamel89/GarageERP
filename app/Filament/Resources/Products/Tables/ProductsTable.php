<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ProductsTable {
    public static function configure(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('category.name')
                    ->label('قسم')
                    ->searchable(),
                TextColumn::make('code')
                    ->label('الكود')
                    ->searchable(),
                TextColumn::make('name')
                    ->label('الاسم')
                    ->searchable(),
                TextColumn::make('buy_price')
                    ->label('سعر الشراء')
                    ->money('EGP')
                    ->sortable(),
                TextColumn::make('sell_price')
                    ->label('سعر البيع')
                    ->money('EGP')
                    ->sortable(),
                TextColumn::make('quantity')
                    ->label('العدد')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('min_stock_quantity')
                    ->label('حد المخزون الأدنى')
                    ->numeric()
                    ->sortable(),

            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
