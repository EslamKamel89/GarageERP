<?php

namespace App\Filament\Resources\Clients\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;

class ClientsTable {
    public static function configure(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('carModel.name')
                    ->label('طراز السيارة')
                    ->searchable(),
                TextColumn::make('name')
                    ->label('الاسم')
                    ->searchable(),
                TextColumn::make('mobile')
                    ->label('الهاتف')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('chassis_nu')
                    ->label('رقم الشاسية')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('plate_nu')
                    ->label('رقم اللوحة')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('odometer')
                    ->label('عداد المسافات')
                    ->numeric()
                    ->sortable()
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                // TrashedFilter::make(),
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
