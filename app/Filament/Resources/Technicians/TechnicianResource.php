<?php

namespace App\Filament\Resources\Technicians;

use App\Filament\Resources\Technicians\Pages\CreateTechnician;
use App\Filament\Resources\Technicians\Pages\EditTechnician;
use App\Filament\Resources\Technicians\Pages\ListTechnicians;
use App\Filament\Resources\Technicians\Pages\ViewTechnician;
use App\Filament\Resources\Technicians\Schemas\TechnicianForm;
use App\Filament\Resources\Technicians\Schemas\TechnicianInfolist;
use App\Filament\Resources\Technicians\Tables\TechniciansTable;
use App\Models\Technician;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use UnitEnum;

class TechnicianResource extends Resource {
    protected static ?string $model = Technician::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::WrenchScrewdriver;

    protected static ?string $recordTitleAttribute = 'الفنين';

    protected static string | UnitEnum | null $navigationGroup = "العملاء و الفنين";

    protected static ?string $navigationLabel = "الفنين";

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema {
        return TechnicianForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema {
        return TechnicianInfolist::configure($schema);
    }

    public static function table(Table $table): Table {
        return TechniciansTable::configure($table);
    }

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => ListTechnicians::route('/'),
            'create' => CreateTechnician::route('/create'),
            'view' => ViewTechnician::route('/{record}'),
            'edit' => EditTechnician::route('/{record}/edit'),
        ];
    }
    public static function getBreadcrumb(): string {
        return "الفنين";
    }
    public static function getRecordTitle(?Model $record): string|Htmlable|null {
        return $record->name;
    }
    public static function getPluralLabel(): ?string {
        return "الفنين";
    }
    public static function getModelLabel(): string {
        return 'فني';
    }
}
