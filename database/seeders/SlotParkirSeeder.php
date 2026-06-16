<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlotParkirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('slot_parkir')->insert([
            ['kode_slot' => 'A1', 'status' => 'kosong'],
            ['kode_slot' => 'A2', 'status' => 'kosong'],
            ['kode_slot' => 'A3', 'status' => 'kosong'],
            ['kode_slot' => 'A4', 'status' => 'kosong'],
            ['kode_slot' => 'B1', 'status' => 'kosong'],
            ['kode_slot' => 'B2', 'status' => 'terisi'],
            ['kode_slot' => 'B3', 'status' => 'terisi'],
            ['kode_slot' => 'B4', 'status' => 'kosong'],
            ['kode_slot' => 'C1', 'status' => 'kosong'],
            ['kode_slot' => 'C2', 'status' => 'kosong'],
            ['kode_slot' => 'C3', 'status' => 'kosong'],
            ['kode_slot' => 'C4', 'status' => 'kosong'],
            ['kode_slot' => 'D1', 'status' => 'terisi'],
        ]);
    }
}
