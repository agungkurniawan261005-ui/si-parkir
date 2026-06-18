@extends('layouts.main')

@section('content')
    <div class="max-w-5xl mx-auto w-full px-4 sm:px-6 py-8">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Informasi <span class="text-brand-600">Tarif Parkir</span></h2>
            <p class="text-slate-500 max-w-2xl mx-auto">Tarif parkir transparan dan terjangkau. Dihitung secara presisi berdasarkan waktu kendaraan Anda berada di area parkir.</p>
        </div>

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
                    <p class="text-sm text-gray-500 mt-1">per detik</p>
                </div>
            @endforeach
        </div>
        
        <div class="mt-16 bg-brand-50 rounded-2xl p-6 flex items-start gap-4 border border-brand-100 animate-fade-in-up animation-delay-400">
            <div class="bg-white p-2 rounded-full shadow-sm text-brand-600 flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <h4 class="font-semibold text-brand-900 mb-1">Catatan Penting</h4>
                <p class="text-sm text-brand-700 leading-relaxed">Sistem kami menggunakan perhitungan per detik untuk memberikan tarif yang paling adil. Estimasi total biaya akan otomatis muncul saat Anda melacak kendaraan Anda menggunakan plat nomor.</p>
            </div>
        </div>
    </div>
    
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }
        .animation-delay-400 { animation-delay: 400ms; }
    </style>
@endsection