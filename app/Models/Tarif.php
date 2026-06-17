<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tarif extends Model
{
    protected $table = 'tarif';
    protected $primaryKey = 'id_tarif';
    public $timestamps = false;

    protected $fillable = ['jenis_kendaraan', 'tarif_per_jam'];

    // Relasi: Tarif digunakan oleh banyak Kendaraan
    public function kendaraans(): HasMany
    {
        return $this->hasMany(Kendaraan::class, 'id_tarif', 'id_tarif');
    }
}