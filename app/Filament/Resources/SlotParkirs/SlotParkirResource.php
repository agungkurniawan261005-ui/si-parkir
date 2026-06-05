<?php

namespace App\Filament\Resources\SlotParkirs;

use App\Filament\Resources\SlotParkirs\Pages\CreateSlotParkir;
use App\Filament\Resources\SlotParkirs\Pages\EditSlotParkir;
use App\Filament\Resources\SlotParkirs\Pages\ListSlotParkirs;
use App\Filament\Resources\SlotParkirs\Schemas\SlotParkirForm;
use App\Filament\Resources\SlotParkirs\Tables\SlotParkirsTable;
use App\Models\SlotParkir;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SlotParkirResource extends Resource
{
    protected static ?string $model = SlotParkir::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'kode_slot';

    public static function form(Schema $schema): Schema
    {
        return SlotParkirForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SlotParkirsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSlotParkirs::route('/'),
            'create' => CreateSlotParkir::route('/create'),
            'edit' => EditSlotParkir::route('/{record}/edit'),
        ];
    }
}
