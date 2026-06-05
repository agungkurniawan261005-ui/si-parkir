@extends('layouts.main')

@section('content')
<div class="container mx-auto p-6 mt-10 max-w-2xl flex-grow">
        
        <div class="bg-white rounded-xl shadow-md p-8 mb-8 border-t-4 border-blue-500">
            <h2 class="text-3xl font-bold text-center mb-2">Lacak Kendaraan Anda</h2>
            <p class="text-center text-gray-600 mb-6">Masukkan nomor polisi (plat) kendaraan Anda untuk mengecek status dan estimasi biaya parkir.</p>

            <form action="/lacak-parkir" method="GET" class="flex flex-col sm:flex-row gap-4">
                <input type="text" name="plat_nomor" value="{{ request('plat_nomor') }}" placeholder="Contoh: B 1234 XYZ" 
                       class="flex-grow px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg uppercase" required>
                <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition shadow-md">
                    CARI
                </button>
            </form>
        </div>

        @if($platNomor)
            @if(!$kendaraan)
                <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg text-center font-semibold">
                    ❌ Kendaraan dengan plat nomor <span class="uppercase font-bold">{{ $platNomor }}</span> tidak ditemukan di sistem kami.
                </div>
            @elseif(!$transaksi)
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-800 px-6 py-4 rounded-lg text-center font-semibold">
                    ⚠️ Kendaraan <span class="uppercase font-bold">{{ $platNomor }}</span> saat ini tidak terdaftar berada di dalam area parkir (Status: Sudah Keluar/Belum Masuk).
                </div>
            @else
                <div class="bg-white rounded-xl shadow-lg border overflow-hidden">
                    <div class="bg-green-500 text-white text-center py-3 font-bold text-lg tracking-widest">
                        STATUS: SEDANG PARKIR
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-4 mb-6 border-b pb-6">
                            <div>
                                <p class="text-sm text-gray-500">Plat Nomor</p>
                                <p class="text-2xl font-bold uppercase">{{ $kendaraan->plat_nomor }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">Jenis Kendaraan</p>
                                <p class="text-xl font-semibold capitalize">{{ $kendaraan->jenis_kendaraan }}</p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex justify-between items-center bg-gray-50 p-3 rounded">
                                <span class="text-gray-600">Waktu Masuk</span>
                                <span class="font-bold">{{ \Carbon\Carbon::parse($transaksi->waktu_masuk)->format('d M Y, H:i') }} WIB</span>
                            </div>
                            <div class="flex justify-between items-center bg-gray-50 p-3 rounded">
                                <span class="text-gray-600">Durasi Parkir</span>
                                <span class="font-bold text-blue-600">{{ $durasiJam }} Jam</span>
                            </div>
                            <div class="flex justify-between items-center bg-blue-50 p-4 rounded-lg border border-blue-100 mt-4">
                                <span class="text-gray-800 font-semibold text-lg">Estimasi Biaya Sementara</span>
                                <span class="font-extrabold text-2xl text-blue-700">Rp {{ number_format($estimasiBiaya, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <p class="text-xs text-center text-gray-400 mt-4">*Biaya dapat berubah bergantung pada waktu kendaraan meninggalkan gerbang parkir.</p>
                    </div>
                </div>
            @endif
        @endif

    </div>
@endsection