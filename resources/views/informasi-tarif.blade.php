@extends('layouts.main')

@section('content')
    <div class="max-w-5xl mx-auto w-full px-4 sm:px-6 py-8">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Informasi <span class="text-brand-600">Tarif Parkir</span></h2>
            <p class="text-slate-500 max-w-2xl mx-auto">Tarif parkir transparan dan terjangkau. Dihitung secara presisi berdasarkan waktu kendaraan Anda berada di area parkir.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($tarifs as $index => $tarif)
                <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-sm border border-slate-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2 animate-fade-in-up group relative" style="animation-delay: {{ $index * 100 }}ms;">
                    
                    <!-- Top accent border -->
                    <div class="h-2 w-full bg-gradient-to-r from-brand-400 to-cyan-400"></div>
                    
                    <div class="p-8 text-center relative z-10">
                        <div class="w-20 h-20 mx-auto bg-brand-50 rounded-2xl flex items-center justify-center text-4xl mb-6 shadow-inner transform transition-transform group-hover:scale-110 group-hover:rotate-3 duration-300">
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
                        
                        <h3 class="text-xl font-bold text-slate-800 uppercase tracking-wide mb-4">{{ $tarif->jenis_kendaraan }}</h3>
                        
                        <div class="flex items-baseline justify-center gap-1 mb-2">
                            <span class="text-slate-500 font-semibold">Rp</span>
                            <span class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-cyan-600">{{ number_format($tarif->tarif_per_jam, 0, ',', '.') }}</span>
                        </div>
                        
                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-slate-50 rounded-full text-xs font-medium text-slate-500 mb-6">
                            <svg class="w-4 h-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Tarif per Detik
                        </div>
                        
                        <ul class="text-sm text-slate-500 space-y-3 text-left">
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Area parkir khusus
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Keamanan 24 jam
                            </li>
                        </ul>
                    </div>
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