<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kendaraan extends Model
{
    use SoftDeletes;

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

    protected static function boot()
    {
        parent::boot();

        $createTransaksi = function ($kendaraan) {
            // Cari slot parkir yang kosong
            $slot = \App\Models\SlotParkir::where('status', 'kosong')->first();
            $slotId = $slot ? $slot->id_slot : (\App\Models\SlotParkir::first()->id_slot ?? 1);

            if ($slot) {
                $slot->update(['status' => 'terisi']);
            }

            \App\Models\Transaksi::create([
                'id_kendaraan' => $kendaraan->id_kendaraan,
                'id_slot'      => $slotId,
                'id_user'      => auth()->id() ?? 1,
                'waktu_masuk'  => now(),
                'status'       => 'masuk',
            ]);
        };

        static::created($createTransaksi);
        static::restored($createTransaksi);

        static::deleting(function ($kendaraan) {
            // Kembalikan status slot parkir menjadi kosong sebelum transaksi dihapus oleh cascade DB
            foreach ($kendaraan->transaksis as $transaksi) {
                if ($transaksi->slotParkir && $transaksi->status === 'masuk') {
                    $transaksi->slotParkir->update(['status' => 'kosong']);
                }
            }
        });
    }
}