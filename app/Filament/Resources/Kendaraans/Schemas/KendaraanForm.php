<?php

namespace App\Filament\Resources\Kendaraans\Schemas;

use App\Models\Tarif;
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
                    ->placeholder('Contoh: B 1234 ABC')
                    ->required()
                    ->maxLength(20),
                
                // Ambil jenis kendaraan dari tabel tarif agar selalu sinkron
                Select::make('jenis_kendaraan')
                    ->label('Jenis Kendaraan')
                    ->options(fn () => Tarif::pluck('jenis_kendaraan', 'jenis_kendaraan')
                        ->mapWithKeys(fn ($value) => [$value => ucfirst($value)])
                    )
                    ->required()
                    ->searchable()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Otomatis isi id_tarif sesuai jenis kendaraan yang dipilih
                        $tarif = Tarif::where('jenis_kendaraan', $state)->first();
                        if ($tarif) {
                            $set('id_tarif', $tarif->id_tarif);
                        }
                    }),
                
                TextInput::make('pemilik')
                    ->label('Nama Pemilik')
                    ->placeholder('Contoh: Ahmad Fauzi')
                    ->required()
                    ->maxLength(100),
                
                // Dropdown tarif yang menampilkan jenis + harga
                Select::make('id_tarif')
                    ->label('Tarif Parkir')
                    ->options(fn () => Tarif::all()->mapWithKeys(fn ($tarif) => [
                        $tarif->id_tarif => ucfirst($tarif->jenis_kendaraan) . ' — Rp ' . number_format($tarif->tarif_per_jam, 0, ',', '.')
                    ]))
                    ->required()
                    ->searchable(),
            ]);
    }
}