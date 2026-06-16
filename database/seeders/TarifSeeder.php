<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('tarif')->insert([
            ['jenis_kendaraan' => 'motor',  'tarif_per_jam' => 2000],
            ['jenis_kendaraan' => 'mobil',  'tarif_per_jam' => 5000],
            ['jenis_kendaraan' => 'truk',   'tarif_per_jam' => 10000],
            ['jenis_kendaraan' => 'bis',    'tarif_per_jam' => 15000],
        ]);
    }
}
