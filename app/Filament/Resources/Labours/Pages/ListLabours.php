<?php

namespace App\Filament\Resources\Labours\Pages;

use App\Filament\Resources\Labours\LabourResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLabours extends ListRecords
{
    protected static string $resource = LabourResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
