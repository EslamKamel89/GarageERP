<?php

namespace App\Filament\Resources\CarModels;

use App\Filament\Resources\CarModels\Pages\CreateCarModel;
use App\Filament\Resources\CarModels\Pages\EditCarModel;
use App\Filament\Resources\CarModels\Pages\ListCarModels;
use App\Filament\Resources\CarModels\Pages\ViewCarModel;
use App\Filament\Resources\CarModels\Schemas\CarModelForm;
use App\Filament\Resources\CarModels\Schemas\CarModelInfolist;
use App\Filament\Resources\CarModels\Tables\CarModelsTable;
use App\Models\CarModel;
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

class CarModelResource extends Resource {
    protected static ?string $model = CarModel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Bookmark;



    protected static ?string $recordTitleAttribute = 'موديل السيارة';
    protected static ?string $navigationLabel = "موديل السيارة";

    protected static string | UnitEnum | null $navigationGroup = "المعلومات";
    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema {
        return CarModelForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema {
        return CarModelInfolist::configure($schema);
    }

    public static function table(Table $table): Table {
        return CarModelsTable::configure($table);
    }

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => ListCarModels::route('/'),
            'create' => CreateCarModel::route('/create'),
            'view' => ViewCarModel::route('/{record}'),
            'edit' => EditCarModel::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
    public static function getBreadcrumb(): string {
        return 'موديل السيارة';
    }
    public static function getRecordTitle(?Model $record): string|Htmlable|null {
        return $record->name;
    }
    public static function getPluralLabel(): ?string {
        return 'موديل السيارة';
    }
    public static function getModelLabel(): string {
        return 'موديل السيارة';
    }
}
