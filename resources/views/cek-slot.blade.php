@extends('layouts.main')

@section('content')
    <div class="max-w-6xl mx-auto w-full px-4 sm:px-6">
        <div class="text-center mb-10 animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Ketersediaan <span class="text-brand-600">Slot Parkir</span></h2>
            <p class="text-slate-500 max-w-2xl mx-auto">Pantau ketersediaan area parkir secara real-time. Slot hijau menandakan area kosong yang siap digunakan.</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 animate-fade-in-up animation-delay-100">
            <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-slate-100 p-6 flex items-center gap-6 transition-transform hover:-translate-y-1">
                <div class="w-16 h-16 rounded-2xl bg-brand-50 flex items-center justify-center text-brand-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Total Slot</h3>
                    <p class="text-4xl font-extrabold text-slate-800">{{ $total }}</p>
                </div>
            </div>
            
            <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-slate-100 p-6 flex items-center gap-6 transition-transform hover:-translate-y-1 relative overflow-hidden">
                <div class="absolute right-0 top-0 w-32 h-32 bg-green-50 rounded-full translate-x-16 -translate-y-16 blur-2xl"></div>
                <div class="w-16 h-16 rounded-2xl bg-green-50 flex items-center justify-center text-green-500 relative z-10">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="relative z-10">
                    <h3 class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Tersedia</h3>
                    <p class="text-4xl font-extrabold text-green-500">{{ $tersedia }}</p>
                </div>
            </div>
            
            <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-slate-100 p-6 flex items-center gap-6 transition-transform hover:-translate-y-1 relative overflow-hidden">
                <div class="absolute right-0 top-0 w-32 h-32 bg-red-50 rounded-full translate-x-16 -translate-y-16 blur-2xl"></div>
                <div class="w-16 h-16 rounded-2xl bg-red-50 flex items-center justify-center text-red-500 relative z-10">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="relative z-10">
                    <h3 class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Terisi</h3>
                    <p class="text-4xl font-extrabold text-red-500">{{ $terisi }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-sm border border-slate-100 p-8 animate-fade-in-up animation-delay-200">
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-100">
                <h3 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                    <svg class="w-6 h-6 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Denah Slot Parkir
                </h3>
                
                <!-- Legend -->
                <div class="hidden sm:flex items-center gap-4 text-sm">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-emerald-400"></span>
                        <span class="text-slate-600">Tersedia</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-rose-400"></span>
                        <span class="text-slate-600">Terisi</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
                @foreach($slots as $slot)
                    <div class="group relative aspect-square rounded-2xl flex flex-col items-center justify-center p-4 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 overflow-hidden cursor-default
                        {{ $slot->status == 'kosong' ? 'bg-emerald-50 border-2 border-emerald-100 text-emerald-700' : 'bg-rose-50 border-2 border-rose-100 text-rose-700' }}">
                        
                        <!-- Background glow effect on hover -->
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-20 transition-opacity duration-300 {{ $slot->status == 'kosong' ? 'bg-gradient-to-br from-emerald-400 to-transparent' : 'bg-gradient-to-br from-rose-400 to-transparent' }}"></div>

                        <span class="block text-3xl font-black mb-2 relative z-10">{{ $slot->kode_slot }}</span>
                        
                        <div class="relative z-10 w-full flex justify-center">
                            <span class="text-xs font-semibold px-3 py-1 rounded-full shadow-sm w-full text-center
                                {{ $slot->status == 'kosong' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                                {{ $slot->status == 'kosong' ? 'Tersedia' : 'Terisi' }}
                            </span>
                        </div>
                    </div>
                @endforeach
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
        .animation-delay-100 { animation-delay: 100ms; }
        .animation-delay-200 { animation-delay: 200ms; }
    </style>
@endsection