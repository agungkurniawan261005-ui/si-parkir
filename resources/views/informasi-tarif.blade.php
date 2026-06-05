@extends('layouts.main')

@section('content')
<div class="container mx-auto p-6 mt-6 max-w-4xl">
        <h2 class="text-3xl font-bold text-center mb-2">Informasi Tarif Parkir</h2>
        <p class="text-center text-gray-600 mb-10">Berikut adalah daftar harga parkir per jam untuk setiap jenis kendaraan.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($tarifs as $tarif)
                <div class="bg-white rounded-xl shadow-sm p-6 text-center border-t-4 border-blue-500 hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="text-5xl mb-4">
                        @if(strtolower($tarif->jenis_kendaraan) == 'motor')
                            🏍️
                        @elseif(strtolower($tarif->jenis_kendaraan) == 'mobil')
                            🚗
                        @elseif(strtolower($tarif->jenis_kendaraan) == 'truk')
                            🚚
                        @else
                            🚙
                        @endif
                    </div>
                    
                    <h3 class="text-2xl font-bold text-gray-700 uppercase mb-2">{{ $tarif->jenis_kendaraan }}</h3>
                    
                    <p class="text-3xl font-extrabold text-blue-600">
                        Rp {{ number_format($tarif->tarif_per_jam, 0, ',', '.') }}
                    </p>
                    <p class="text-sm text-gray-500 mt-1">per jam</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection