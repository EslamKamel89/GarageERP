<?php

namespace App\Filament\Resources\Labours\Pages;

use App\Filament\Resources\Labours\LabourResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLabour extends ViewRecord
{
    protected static string $resource = LabourResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
