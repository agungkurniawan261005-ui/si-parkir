<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kendaraan extends Model
{
    // Beritahu nama tabel aslinya
    protected $table = 'kendaraan';
    
    // Beritahu primary key aslinya
    protected $primaryKey = 'id_kendaraan';
    
    // Matikan timestamps karena tabel Anda tidak punya kolom updated_at
    public $timestamps = false;

    // Kolom yang boleh diisi
    protected $fillable = ['plat_nomor', 'jenis_kendaraan', 'pemilik', 'id_tarif'];

    // Relasi: Kendaraan memiliki satu Tarif
    public function tarif(): BelongsTo
    {
        return $this->belongsTo(Tarif::class, 'id_tarif', 'id_tarif');
    }

    // Relasi: Kendaraan memiliki banyak Transaksi
    public function transaksis(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'id_kendaraan', 'id_kendaraan');
    }
}