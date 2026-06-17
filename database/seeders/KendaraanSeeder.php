<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('kendaraan')->insert([
            ['plat_nomor' => 'B 1234 ABC', 'jenis_kendaraan' => 'motor', 'pemilik' => 'Ahmad Fauzi',    'id_tarif' => 1],
            ['plat_nomor' => 'D 5678 XYZ', 'jenis_kendaraan' => 'mobil', 'pemilik' => 'Rina Wati',      'id_tarif' => 2],
            ['plat_nomor' => 'F 9999 QRS', 'jenis_kendaraan' => 'motor', 'pemilik' => 'Dedi Cahyono',   'id_tarif' => 1],
            ['plat_nomor' => 'H 4321 MNO', 'jenis_kendaraan' => 'mobil', 'pemilik' => 'Lutfi Hakim',    'id_tarif' => 2],
            ['plat_nomor' => 'G 8888 PQR', 'jenis_kendaraan' => 'motor', 'pemilik' => 'Mira Lestari',   'id_tarif' => 1],
            ['plat_nomor' => 'B 7777 STU', 'jenis_kendaraan' => 'truk',  'pemilik' => 'PT Maju Jaya',   'id_tarif' => 3],
            ['plat_nomor' => 'D 1111 VWX', 'jenis_kendaraan' => 'motor', 'pemilik' => 'Yudi Pratama',   'id_tarif' => 1],
            ['plat_nomor' => 'E 2222 YZA', 'jenis_kendaraan' => 'mobil', 'pemilik' => 'Dewi Anggraini', 'id_tarif' => 2],
        ]);
    }
}
