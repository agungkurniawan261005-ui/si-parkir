<?php

namespace App\Filament\Resources\Transaksis\Pages;

use App\Filament\Resources\Transaksis\TransaksiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTransaksi extends EditRecord
{
    protected static string $resource = TransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Jika ada waktu keluar, hitung total bayar otomatis
        if (!empty($data['waktu_keluar']) && !empty($data['waktu_masuk'])) {
            $waktuMasuk = \Carbon\Carbon::parse($data['waktu_masuk']);
            $waktuKeluar = \Carbon\Carbon::parse($data['waktu_keluar']);
            
            // Hitung selisih dalam jam, dibulatkan ke atas (minimal 1 jam)
            $durasiJam = max(1, ceil($waktuMasuk->floatDiffInHours($waktuKeluar)));

            // Ambil tarif berdasarkan jenis kendaraan
            $kendaraan = \App\Models\Kendaraan::with('tarif')->find($data['id_kendaraan']);
            
            if ($kendaraan && $kendaraan->tarif) {
                $data['total_bayar'] = $durasiJam * $kendaraan->tarif->tarif_per_jam;
            } else {
                $data['total_bayar'] = 0;
            }
        }

        return $data;
    }
}
