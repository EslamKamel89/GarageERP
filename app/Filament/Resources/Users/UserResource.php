<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Pages\ViewUser;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Schemas\UserInfolist;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Htmlable;
use UnitEnum;

class UserResource extends Resource {
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserCircle;

    protected static ?string $recordTitleAttribute = 'المستخدمون';

    protected static string | UnitEnum | null $navigationGroup = "النظام";

    protected static ?string $navigationLabel = "المستخدمون";

    public static function form(Schema $schema): Schema {
        self::$navigationLabel;
        return UserForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema {
        return UserInfolist::configure($schema);
    }

    public static function table(Table $table): Table {
        return UsersTable::configure($table);
    }

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'view' => ViewUser::route('/{record}'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
    public static function getBreadcrumb(): string {
        return "المستخدمين";
    }
    public static function getRecordTitle(?Model $record): string|Htmlable|null {
        return $record->name;
    }
    public static function getPluralLabel(): ?string {
        return "المستخدمين";
    }
    public static function getModelLabel(): string {
        return 'مستخدم';
    }
}
