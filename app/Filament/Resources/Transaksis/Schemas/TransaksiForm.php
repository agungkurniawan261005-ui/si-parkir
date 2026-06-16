<?php

namespace App\Filament\Resources\Transaksis\Schemas;

use App\Models\Kendaraan;
use App\Models\SlotParkir;
use App\Models\User;
use App\Models\Tarif;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransaksiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_kendaraan')
                    ->label('Kendaraan')
                    ->relationship('kendaraan', 'plat_nomor')
                    ->getOptionLabelFromRecordUsing(fn (\App\Models\Kendaraan $record) => "{$record->plat_nomor} — {$record->pemilik} (" . ucfirst($record->jenis_kendaraan) . ")")
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionUsing(function (array $data) {
                        $kendaraan = \App\Models\Kendaraan::withTrashed()->where('plat_nomor', $data['plat_nomor'])->first();
                        if ($kendaraan) {
                            if ($kendaraan->trashed()) {
                                $kendaraan->restore();
                            }
                            $kendaraan->update($data);
                            return $kendaraan->getKey();
                        }
                        return \App\Models\Kendaraan::create($data)->getKey();
                    })
                    ->createOptionForm([
                        TextInput::make('plat_nomor')
                            ->label('Plat Nomor')
                            ->placeholder('Contoh: B 1234 ABC')
                            ->required()
                            ->maxLength(20)
                            ->extraInputAttributes(['style' => 'text-transform: uppercase'])
                            ->lazy()
                            ->afterStateUpdated(function (?string $state, callable $set) {
                                if (!$state) return;
                                $plat = strtoupper(preg_replace('/[^A-Z0-9]/i', '', $state));
                                preg_match('/^([A-Z]{1,2})([0-9]{1,4})([A-Z]{0,3})$/', $plat, $matches);
                                if (count($matches) >= 3) {
                                    $result = $matches[1] . ' ' . $matches[2];
                                    if (isset($matches[3]) && $matches[3] != '') $result .= ' ' . $matches[3];
                                    $set('plat_nomor', $result);
                                } else {
                                    $set('plat_nomor', $plat);
                                }
                            })
                            ->dehydrateStateUsing(fn ($state) => strtoupper($state)),
                        Select::make('jenis_kendaraan')
                            ->label('Jenis Kendaraan')
                            ->options(fn () => Tarif::pluck('jenis_kendaraan', 'jenis_kendaraan')
                                ->mapWithKeys(fn ($value) => [$value => ucfirst($value)])
                            )
                            ->required()
                            ->searchable()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                $tarif = Tarif::where('jenis_kendaraan', $state)->first();
                                if ($tarif) {
                                    $set('id_tarif', $tarif->id_tarif);
                                }
                            }),
                        TextInput::make('pemilik')
                            ->label('Nama Pemilik')
                            ->required()
                            ->maxLength(100),
                        Select::make('id_tarif')
                            ->label('Tarif Parkir')
                            ->options(fn () => Tarif::all()->mapWithKeys(fn ($tarif) => [
                                $tarif->id_tarif => ucfirst($tarif->jenis_kendaraan) . ' — Rp ' . number_format($tarif->tarif_per_jam, 0, ',', '.')
                            ]))
                            ->required()
                            ->searchable(),
                    ]),
                
                Select::make('id_slot')
                    ->label('Slot Parkir')
                    ->options(fn ($record) => SlotParkir::all()
                        ->mapWithKeys(fn ($s) => [
                            $s->id_slot => $s->kode_slot . ' — ' . ucfirst($s->status)
                        ])
                    )
                    ->required()
                    ->searchable(),

                Select::make('id_user')
                    ->label('Petugas')
                    ->options(\App\Models\User::pluck('nama', 'id_user'))
                    ->default(fn () => auth()->id())
                    ->searchable()
                    ->required(),

                DateTimePicker::make('waktu_masuk')
                    ->label('Waktu Masuk')
                    ->default(now())
                    ->required(),

                DateTimePicker::make('waktu_keluar')
                    ->label('Waktu Keluar')
                    ->reactive()
                    ->afterStateUpdated(function (callable $get, callable $set) {
                        $masuk = $get('waktu_masuk');
                        $keluar = $get('waktu_keluar');
                        $id_kendaraan = $get('id_kendaraan');

                        if ($masuk && $keluar && $id_kendaraan) {
                            $waktuMasuk = \Carbon\Carbon::parse($masuk);
                            $waktuKeluar = \Carbon\Carbon::parse($keluar);
                            
                            $durasiJam = max(1, ceil($waktuMasuk->floatDiffInHours($waktuKeluar)));

                            $kendaraan = \App\Models\Kendaraan::withTrashed()->with('tarif')->find($id_kendaraan);
                            
                            if ($kendaraan && $kendaraan->tarif) {
                                $set('total_bayar', $durasiJam * $kendaraan->tarif->tarif_per_jam);
                            } else {
                                $set('total_bayar', 0);
                            }
                            
                            // Otomatis ubah status transaksi
                            $set('status', 'keluar');
                        } else {
                            $set('total_bayar', 0);
                            $set('status', 'masuk');
                        }
                    }),

                TextInput::make('total_bayar')
                    ->label('Total Bayar')
                    ->numeric()
                    ->prefix('Rp')
                    ->disabled()
                    ->dehydrated(true), // We MUST dehydrate it if we want the frontend calculated value to be saved!

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