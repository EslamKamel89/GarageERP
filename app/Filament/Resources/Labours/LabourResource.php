<?php

namespace App\Filament\Resources\Labours;

use App\Filament\Resources\Labours\Pages\CreateLabour;
use App\Filament\Resources\Labours\Pages\EditLabour;
use App\Filament\Resources\Labours\Pages\ListLabours;
use App\Filament\Resources\Labours\Pages\ViewLabour;
use App\Filament\Resources\Labours\Schemas\LabourForm;
use App\Filament\Resources\Labours\Schemas\LabourInfolist;
use App\Filament\Resources\Labours\Tables\LaboursTable;
use App\Models\Labour;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class LabourResource extends Resource {
    protected static ?string $model = Labour::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Wrench;



    protected static ?string $recordTitleAttribute = "المصنعيات";
    protected static ?string $navigationLabel = "المصنعيات";

    protected static string | UnitEnum | null $navigationGroup = "المعلومات";
    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema {
        return LabourForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema {
        return LabourInfolist::configure($schema);
    }

    public static function table(Table $table): Table {
        return LaboursTable::configure($table);
    }

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => ListLabours::route('/'),
            'create' => CreateLabour::route('/create'),
            'view' => ViewLabour::route('/{record}'),
            'edit' => EditLabour::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
    public static function getBreadcrumb(): string {
        return "المصنعيات";
    }
    public static function getRecordTitle(?Model $record): string|Htmlable|null {
        return $record->name_ar;
    }
    public static function getPluralLabel(): ?string {
        return "المصنعيات";
    }
    public static function getModelLabel(): string {
        return "مصنعية";
    }
}
