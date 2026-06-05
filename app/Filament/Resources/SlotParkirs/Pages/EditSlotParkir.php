<?php

namespace App\Filament\Resources\SlotParkirs\Pages;

use App\Filament\Resources\SlotParkirs\SlotParkirResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSlotParkir extends EditRecord
{
    protected static string $resource = SlotParkirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
