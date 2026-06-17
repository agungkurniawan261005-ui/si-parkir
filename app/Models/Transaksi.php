<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false;

    protected $fillable = ['id_kendaraan', 'id_slot', 'id_user', 'waktu_masuk', 'waktu_keluar', 'total_bayar', 'status'];

    // Relasi: Transaksi milik satu Kendaraan
    public function kendaraan(): BelongsTo
    {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan', 'id_kendaraan')->withTrashed();
    }

    // Relasi: Transaksi milik satu Slot Parkir
    public function slotParkir(): BelongsTo
    {
        return $this->belongsTo(SlotParkir::class, 'id_slot', 'id_slot');
    }

    // Relasi: Transaksi dicatat oleh satu User/Petugas
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($transaksi) {
            // Jika status berubah menjadi keluar, maka slot parkir kembali kosong
            if ($transaksi->status === 'keluar' && $transaksi->getOriginal('status') === 'masuk') {
                if ($transaksi->slotParkir) {
                    $transaksi->slotParkir->update(['status' => 'kosong']);
                }
                // Kendaraan dihapus dari daftar kendaraan (soft delete) tapi tetap ada di transaksi
                if ($transaksi->kendaraan) {
                    $transaksi->kendaraan->delete();
                }
            }
        });

        static::deleting(function ($transaksi) {
            // Hapus kendaraan secara permanen (termasuk cascade DB) jika transaksi dihapus
            if ($transaksi->kendaraan) {
                $transaksi->kendaraan->forceDelete();
            }

            // Kembalikan status slot parkir menjadi kosong
            if ($transaksi->slotParkir && $transaksi->status === 'masuk') {
                $transaksi->slotParkir->update(['status' => 'kosong']);
            }
        });
    }
}