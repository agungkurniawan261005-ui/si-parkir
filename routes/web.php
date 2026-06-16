<?php

use Illuminate\Support\Facades\Route;
use App\Models\SlotParkir;
use App\Models\Tarif;
use App\Models\Kendaraan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;

Route::get('/', function () {
    return view('home');
});

Route::get('/cek-slot', function () {
    // Ambil semua data slot parkir
    $slots = SlotParkir::all();
    
    // Hitung statistik
    $total = $slots->count();
    $tersedia = $slots->where('status', 'Tersedia')->count();
    $terisi = $slots->where('status', 'Terisi')->count();

    // Kirim data ke tampilan cek-slot.blade.php
    return view('cek-slot', compact('slots', 'total', 'tersedia', 'terisi'));
});

Route::get('/informasi-tarif', function () {
    // Ambil semua data tarif dari database
    $tarifs = Tarif::all();
    
    // Kirim data ke tampilan informasi-tarif.blade.php
    return view('informasi-tarif', compact('tarifs'));
});

Route::get('/lacak-parkir', function (Request $request) {
    // Tangkap input pencarian plat nomor
    $platNomor = $request->query('plat_nomor');
    
    $kendaraan = null;
    $transaksi = null;
    $tarif = null;
    $estimasiBiaya = 0;
    $durasiJam = 0;

    if ($platNomor) {
        // Cari kendaraan berdasarkan plat nomor
        $kendaraan = Kendaraan::where('plat_nomor', $platNomor)->first();
        
        if ($kendaraan) {
            // Jika kendaraan ada, cari transaksi parkir yang masih "Masuk" (belum keluar)
            $transaksi = Transaksi::where('id_kendaraan', $kendaraan->id_kendaraan)
                                  ->where('status', 'Masuk')
                                  ->first();
            
            // Ambil data tarif sesuai ID Tarif kendaraan tersebut
            $tarif = \App\Models\Tarif::where('id_tarif', $kendaraan->id_tarif)->first();

            // Hitung durasi dan estimasi biaya
            if ($transaksi && $tarif) {
                $waktuMasuk = Carbon::parse($transaksi->waktu_masuk);
                $sekarang = Carbon::now();
                
                // Hitung selisih dalam menit
                $durasiMenit = $waktuMasuk->diffInMinutes($sekarang);
                
                // Bulatkan ke atas (misal 65 menit dihitung 2 jam)
                $durasiJam = ceil($durasiMenit / 60);
                
                // Minimal bayar adalah 1 jam
                if ($durasiJam < 1) {
                    $durasiJam = 1;
                }

                $estimasiBiaya = $durasiJam * $tarif->tarif_per_jam;
            }
        }
    }

    return view('lacak-parkir', compact('platNomor', 'kendaraan', 'transaksi', 'tarif', 'estimasiBiaya', 'durasiJam'));
});
Route::get('/tentang-kami', function () {
    return view('tentang-kami');
});

Route::get('/tim-kami', function () {
    $users = App\Models\User::all();
    return view('tim-kami', compact('users'));
});