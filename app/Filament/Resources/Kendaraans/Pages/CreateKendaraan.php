<?php

namespace App\Filament\Resources\Kendaraans\Pages;

use App\Filament\Resources\Kendaraans\KendaraanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKendaraan extends CreateRecord
{
    protected static string $resource = KendaraanResource::class;

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        $kendaraan = static::getModel()::withTrashed()->where('plat_nomor', $data['plat_nomor'])->first();
        
        if ($kendaraan) {
            if ($kendaraan->trashed()) {
                $kendaraan->restore();
            }
            $kendaraan->update($data);
            return $kendaraan;
        }

        return static::getModel()::create($data);
    }
}
