<?php

namespace App\Filament\Resources\SlotParkirs\Pages;

use App\Filament\Resources\SlotParkirs\SlotParkirResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSlotParkirs extends ListRecords
{
    protected static string $resource = SlotParkirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
