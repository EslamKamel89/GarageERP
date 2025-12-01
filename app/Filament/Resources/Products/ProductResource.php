<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\Pages\CreateProduct;
use App\Filament\Resources\Products\Pages\EditProduct;
use App\Filament\Resources\Products\Pages\ListProducts;
use App\Filament\Resources\Products\Pages\ViewProduct;
use App\Filament\Resources\Products\Schemas\ProductForm;
use App\Filament\Resources\Products\Schemas\ProductInfolist;
use App\Filament\Resources\Products\Tables\ProductsTable;
use App\Models\Product;
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

class ProductResource extends Resource {
    protected static ?string $model = Product::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ShoppingCart;

    protected static ?string $recordTitleAttribute = 'المنتجات';
    protected static ?string $navigationLabel = "المنتجات";

    protected static string | UnitEnum | null $navigationGroup = "المنتجات و الاقسام";
    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema {
        return ProductForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema {
        return ProductInfolist::configure($schema);
    }

    public static function table(Table $table): Table {
        return ProductsTable::configure($table);
    }

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'view' => ViewProduct::route('/{record}'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
    public static function getBreadcrumb(): string {
        return "المنتجات";
    }
    public static function getRecordTitle(?Model $record): string|Htmlable|null {
        return $record->name;
    }
    public static function getPluralLabel(): ?string {
        return "المنتجات";
    }
    public static function getModelLabel(): string {
        return 'منتج';
    }
}
