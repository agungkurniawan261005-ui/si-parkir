<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    // Beritahu nama tabel aslinya
    protected $table = 'kendaraan';
    
    // Beritahu primary key aslinya
    protected $primaryKey = 'id_kendaraan';
    
    // Matikan timestamps karena tabel Anda tidak punya kolom updated_at
    public $timestamps = false;

    // Kolom yang boleh diisi (opsional untuk sekarang, tapi penting untuk nanti)
    protected $fillable = ['plat_nomor', 'jenis_kendaraan', 'pemilik', 'id_tarif'];
}