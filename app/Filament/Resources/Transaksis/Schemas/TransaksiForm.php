<?php

namespace App\Filament\Resources\Transaksis\Schemas;

use App\Models\Kendaraan;
use App\Models\SlotParkir;
use App\Models\User;
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
                // Dropdown Kendaraan: tampilkan plat nomor + pemilik
                Select::make('id_kendaraan')
                    ->label('Kendaraan')
                    ->options(fn () => Kendaraan::all()->mapWithKeys(fn ($k) => [
                        $k->id_kendaraan => $k->plat_nomor . ' — ' . $k->pemilik . ' (' . ucfirst($k->jenis_kendaraan) . ')'
                    ]))
                    ->required()
                    ->searchable(),
                
                // Dropdown Slot Parkir: tampilkan kode slot + status
                Select::make('id_slot')
                    ->label('Slot Parkir')
                    ->options(fn () => SlotParkir::all()->mapWithKeys(fn ($s) => [
                        $s->id_slot => $s->kode_slot . ' — ' . ucfirst($s->status)
                    ]))
                    ->required()
                    ->searchable(),

                // Dropdown Petugas: tampilkan nama user
                Select::make('id_user')
                    ->label('Petugas')
                    ->options(fn () => User::all()->mapWithKeys(fn ($u) => [
                        $u->id_user => $u->nama . ' (' . $u->username . ')'
                    ]))
                    ->required()
                    ->searchable(),

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
                        'masuk' => 'Kendaraan Masuk',
                        'keluar' => 'Kendaraan Keluar',
                    ])
                    ->default('masuk')
                    ->required(),
            ]);
    }
}