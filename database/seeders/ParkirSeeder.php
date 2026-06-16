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
        // =============================================
        // 1. TABEL USERS
        // =============================================
        DB::table('users')->insert([
            [
                'nama'       => 'Agung Kurniawan',
                'username'   => 'admin',
                'password'   => Hash::make('admin123'),
                'role'       => 'admin',
                'created_at' => now(),
            ],
            [
                'nama'       => 'Muhammad Fadla Al Fadillah',
                'username'   => 'fadla',
                'password'   => Hash::make('password'),
                'role'       => 'petugas',
                'created_at' => now(),
            ],
            [
                'nama'       => 'Eka Ramadhani',
                'username'   => 'eka',
                'password'   => Hash::make('password'),
                'role'       => 'petugas',
                'created_at' => now(),
            ],
            [
                'nama'       => 'Naya Namira Salwa Putri',
                'username'   => 'naya',
                'password'   => Hash::make('password'),
                'role'       => 'petugas',
                'created_at' => now(),
            ],
            [
                'nama'       => 'Siti Aisyah',
                'username'   => 'aisyah',
                'password'   => Hash::make('password'),
                'role'       => 'petugas',
                'created_at' => now(),
            ],
        ]);

        // =============================================
        // 2. TABEL TARIF
        // =============================================
        DB::table('tarif')->insert([
            ['jenis_kendaraan' => 'motor',  'tarif_per_jam' => 2000],
            ['jenis_kendaraan' => 'mobil',  'tarif_per_jam' => 5000],
            ['jenis_kendaraan' => 'truk',   'tarif_per_jam' => 10000],
            ['jenis_kendaraan' => 'bis',    'tarif_per_jam' => 15000],
        ]);

        // =============================================
        // 3. TABEL KENDARAAN
        // =============================================
        DB::table('kendaraan')->insert([
            ['plat_nomor' => 'B 1234 ABC', 'jenis_kendaraan' => 'motor', 'pemilik' => 'Ahmad Fauzi',    'id_tarif' => 1],
            ['plat_nomor' => 'D 5678 XYZ', 'jenis_kendaraan' => 'mobil', 'pemilik' => 'Rina Wati',      'id_tarif' => 2],
            ['plat_nomor' => 'F 9999 QRS', 'jenis_kendaraan' => 'motor', 'pemilik' => 'Dedi Cahyono',   'id_tarif' => 1],
            ['plat_nomor' => 'H 4321 MNO', 'jenis_kendaraan' => 'mobil', 'pemilik' => 'Lutfi Hakim',    'id_tarif' => 2],
            ['plat_nomor' => 'G 8888 PQR', 'jenis_kendaraan' => 'motor', 'pemilik' => 'Mira Lestari',   'id_tarif' => 1],
            ['plat_nomor' => 'B 7777 STU', 'jenis_kendaraan' => 'truk',  'pemilik' => 'PT Maju Jaya',   'id_tarif' => 3],
            ['plat_nomor' => 'D 1111 VWX', 'jenis_kendaraan' => 'motor', 'pemilik' => 'Yudi Pratama',   'id_tarif' => 1],
            ['plat_nomor' => 'E 2222 YZA', 'jenis_kendaraan' => 'mobil', 'pemilik' => 'Dewi Anggraini', 'id_tarif' => 2],
        ]);

        // =============================================
        // 4. TABEL SLOT PARKIR
        // =============================================
        DB::table('slot_parkir')->insert([
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

        // =============================================
        // 5. TABEL TRANSAKSI
        // =============================================
        DB::table('transaksi')->insert([
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
