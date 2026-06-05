<?php

namespace App\Filament\Resources\Tarifs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TarifForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('jenis_kendaraan')
                    ->label('Jenis Kendaraan (Misal: Motor, Mobil, Truk)')
                    ->required()
                    ->maxLength(50),
                
                TextInput::make('tarif_per_jam')
                    ->label('Tarif per Jam')
                    ->numeric() // Memastikan input hanya berupa angka
                    ->prefix('Rp') // Menambahkan teks Rp di depan kolom input
                    ->required(),
            ]);
    }
}