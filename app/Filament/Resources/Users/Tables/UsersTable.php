<?php

namespace App\Filament\Resources\Users\Tables;

use App\Filament\Helpers\Utils;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;

class UsersTable {
    public static function configure(Table $table): Table {
        return $table
            ->columns(
                Utils::responsiveTableLayout([
                    TextColumn::make('name')
                        ->label('الاسم')
                        ->searchable()
                        ->sortable()
                        ->wrap(),
                    TextColumn::make('email')
                        ->label('البريد الإلكتروني')
                        ->searchable()
                        ->sortable()
                        ->wrap(),
                    TextColumn::make('created_at')
                        ->label('تاريخ الإنشاء')
                        ->dateTime()
                        ->sortable(),
                ])

            )
            ->filters([
                //
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
                ]),
            ]);
    }
}
