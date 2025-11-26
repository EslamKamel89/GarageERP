<?php

namespace App\Filament\Resources\Clients\RelationManagers;

use Filament\Actions\ActionGroup;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ClientNotesRelationManager extends RelationManager {
    protected static string $relationship = 'clientNotes';

    public function form(Schema $schema): Schema {
        return $schema
            ->components([
                // Select::make('client_id')
                //     ->relationship('client', 'name')
                //     ->label('عميل')
                //     ->searchable()
                //     ->preload()
                //     ->required(),
                Textarea::make('content')
                    ->label('ملاحظات')
                    ->columnSpanFull(),
            ]);
    }

    public function infolist(Schema $schema): Schema {
        return $schema
            ->components([
                TextEntry::make('client.name')
                    ->label('الاسم'),
                TextEntry::make('content')
                    ->label('ملاحظات')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->label('تاريخ الانشاء')
                    ->dateTime()
                    ->placeholder('-')
            ]);
    }

    public function table(Table $table): Table {
        return $table
            ->recordTitleAttribute('content')
            ->columns([
                // TextColumn::make('client.name')
                //     ->label('الاسم')
                //     ->searchable(),
                TextColumn::make('content')
                    ->label('ملاحظات'),
                TextColumn::make('created_at')
                    ->label('تاريخ الانشاء')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                // AssociateAction::make(),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    // DissociateAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }


    public static function getModelLabel(): string {
        return 'ملاحظة';
    }
}
