<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false;

    protected $fillable = ['id_kendaraan', 'id_slot', 'id_user', 'waktu_masuk', 'waktu_keluar', 'total_bayar', 'status'];
}