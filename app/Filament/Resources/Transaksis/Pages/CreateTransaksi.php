<?php

namespace App\Filament\Resources\Transaksis\Pages;

use App\Filament\Resources\Transaksis\TransaksiResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaksi extends CreateRecord
{
    protected static string $resource = TransaksiResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Jika petugas langsung mengisi waktu keluar saat create, hitung bayarnya
        if (!empty($data['waktu_keluar']) && !empty($data['waktu_masuk'])) {
            $waktuMasuk = \Carbon\Carbon::parse($data['waktu_masuk']);
            $waktuKeluar = \Carbon\Carbon::parse($data['waktu_keluar']);
            
            $durasiJam = max(1, ceil($waktuMasuk->floatDiffInHours($waktuKeluar)));

            $kendaraan = \App\Models\Kendaraan::with('tarif')->find($data['id_kendaraan']);
            if ($kendaraan && $kendaraan->tarif) {
                $data['total_bayar'] = $durasiJam * $kendaraan->tarif->tarif_per_jam;
            } else {
                $data['total_bayar'] = 0;
            }
        } elseif (!isset($data['total_bayar'])) {
            // Beri nilai 0 jika belum ada waktu keluar agar tidak error constraint
            $data['total_bayar'] = 0; 
        }

        return $data;
    }
}
