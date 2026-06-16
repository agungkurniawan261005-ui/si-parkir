<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParkirSeeder extends Seeder
{
    /**
     * Seed data awal untuk sistem parkir.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TarifSeeder::class,
            KendaraanSeeder::class,
            SlotParkirSeeder::class,
            TransaksiSeeder::class,
        ]);
    }
}
