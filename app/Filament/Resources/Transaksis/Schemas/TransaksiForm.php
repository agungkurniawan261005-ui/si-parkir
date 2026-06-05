<?php

namespace App\Filament\Resources\Transaksis\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransaksiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Sementara kita gunakan ID angka. 
                // Nanti saat relasi Eloquent sudah terpasang, ini bisa diganti jadi Select Dropdown yang menarik nama.
                TextInput::make('id_kendaraan')
                    ->label('ID Kendaraan')
                    ->numeric()
                    ->required(),
                
                TextInput::make('id_slot')
                    ->label('ID Slot Parkir')
                    ->numeric()
                    ->required(),

                TextInput::make('id_user')
                    ->label('ID Petugas (User)')
                    ->numeric()
                    ->required(),

                DateTimePicker::make('waktu_masuk')
                    ->label('Waktu Masuk')
                    ->required(),

                DateTimePicker::make('waktu_keluar')
                    ->label('Waktu Keluar'),

                TextInput::make('total_bayar')
                    ->label('Total Bayar')
                    ->numeric()
                    ->prefix('Rp'),

                Select::make('status')
                    ->label('Status Transaksi')
                    ->options([
                        'Masuk' => 'Kendaraan Masuk',
                        'Keluar' => 'Kendaraan Keluar',
                    ])
                    ->default('Masuk')
                    ->required(),
            ]);
    }
}