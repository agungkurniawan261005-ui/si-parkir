<?php

namespace App\Filament\Resources\Kendaraans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KendaraanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('plat_nomor')
                    ->label('Plat Nomor')
                    ->required()
                    ->maxLength(20),
                
                Select::make('jenis_kendaraan')
                    ->label('Jenis Kendaraan')
                    ->options([
                        'motor' => 'Motor',
                        'mobil' => 'Mobil',
                        'truk' => 'Truk',
                    ])
                    ->required(),
                
                TextInput::make('pemilik')
                    ->label('Nama Pemilik')
                    ->required()
                    ->maxLength(100),
                
                TextInput::make('id_tarif')
                    ->label('ID Tarif (1=Motor, 2=Mobil, 3=Truk)')
                    ->numeric()
                    ->required(),
            ]);
    }
}