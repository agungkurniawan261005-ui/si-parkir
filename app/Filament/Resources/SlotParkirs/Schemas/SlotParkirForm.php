<?php

namespace App\Filament\Resources\SlotParkirs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SlotParkirForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_slot')
                    ->label('Kode Slot (Contoh: A1, B2)')
                    ->required()
                    ->maxLength(10),
                
                Select::make('status')
                    ->label('Status Slot')
                    ->options([
                        'Tersedia' => 'Tersedia',
                        'Terisi' => 'Terisi',
                    ])
                    ->default('Tersedia') // Set default ke Tersedia saat membuat baru
                    ->required(),
            ]);
    }
}