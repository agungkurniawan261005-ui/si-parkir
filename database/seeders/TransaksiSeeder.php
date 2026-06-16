<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('transaksi')->insert([
            [
                'id_kendaraan' => 1,
                'id_slot'      => 1,
                'id_user'      => 2,
                'waktu_masuk'  => '2025-05-01 08:00:00',
                'waktu_keluar' => '2025-05-01 10:00:00',
                'total_bayar'  => 4000,
                'status'       => 'keluar',
            ],
            [
                'id_kendaraan' => 2,
                'id_slot'      => 5,
                'id_user'      => 2,
                'waktu_masuk'  => '2025-05-01 09:00:00',
                'waktu_keluar' => '2025-05-01 12:00:00',
                'total_bayar'  => 15000,
                'status'       => 'keluar',
            ],
            [
                'id_kendaraan' => 3,
                'id_slot'      => 2,
                'id_user'      => 2,
                'waktu_masuk'  => '2025-05-02 07:30:00',
                'waktu_keluar' => '2025-05-02 09:30:00',
                'total_bayar'  => 4000,
                'status'       => 'keluar',
            ],
            [
                'id_kendaraan' => 4,
                'id_slot'      => 6,
                'id_user'      => 2,
                'waktu_masuk'  => '2025-05-02 10:00:00',
                'waktu_keluar' => '2025-05-02 14:00:00',
                'total_bayar'  => 20000,
                'status'       => 'keluar',
            ],
            [
                'id_kendaraan' => 5,
                'id_slot'      => 3,
                'id_user'      => 2,
                'waktu_masuk'  => '2025-05-03 08:00:00',
                'waktu_keluar' => '2025-05-03 09:00:00',
                'total_bayar'  => 2000,
                'status'       => 'keluar',
            ],
            [
                'id_kendaraan' => 7,
                'id_slot'      => 6,
                'id_user'      => 2,
                'waktu_masuk'  => '2026-06-05 19:14:00',
                'waktu_keluar' => null,
                'total_bayar'  => 2000,
                'status'       => 'masuk',
            ],
        ]);
    }
}
