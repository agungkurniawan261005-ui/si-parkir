@extends('layouts.main')

@section('content')
    <div class="flex flex-col items-center justify-center flex-grow py-12 px-4 sm:px-6 relative w-full">
        <!-- Hero Content -->
        <div class="relative z-10 text-center max-w-4xl mx-auto flex flex-col items-center">
            
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-50 border border-brand-100 text-brand-700 text-sm font-medium mb-8 animate-fade-in-up">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-500"></span>
                </span>
                Sistem Manajemen Parkir Pintar
            </div>

            <h1 class="text-5xl sm:text-6xl md:text-7xl font-extrabold text-slate-900 tracking-tight mb-6 leading-tight animate-fade-in-up animation-delay-100">
                Parkir Lebih <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-cyan-500">Mudah</span>,<br class="hidden sm:block" />
                Aman, & Terpercaya
            </h1>
            
            <p class="text-lg sm:text-xl text-slate-600 mb-10 max-w-2xl leading-relaxed animate-fade-in-up animation-delay-200">
                Temukan kenyamanan memarkirkan kendaraan Anda bersama kami. Pantau ketersediaan slot, cek tarif, dan lacak kendaraan Anda dalam satu platform.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto animate-fade-in-up animation-delay-300">
                <a href="/cek-slot" class="group relative w-full sm:w-auto flex justify-center items-center gap-2 px-8 py-4 bg-brand-600 text-white rounded-xl font-semibold overflow-hidden transition-all hover:shadow-xl hover:shadow-brand-500/30 hover:-translate-y-1">
                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out"></div>
                    <span class="relative flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                        Cek Slot Parkir
                    </span>
                </a>
                
                <a href="/lacak-parkir" class="group w-full sm:w-auto flex justify-center items-center gap-2 px-8 py-4 bg-white text-slate-700 border border-slate-200 rounded-xl font-semibold transition-all hover:bg-slate-50 hover:border-brand-300 hover:text-brand-600 hover:shadow-lg hover:-translate-y-1">
                    <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    Lacak Kendaraan
                </a>
            </div>
            
            <!-- Quick links/features -->
            <div class="mt-20 grid grid-cols-1 sm:grid-cols-3 gap-6 w-full max-w-3xl animate-fade-in-up animation-delay-400">
                <div class="flex flex-col items-center p-4 bg-white/60 backdrop-blur-sm rounded-2xl border border-white shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">Real-time</h3>
                    <p class="text-sm text-slate-500 text-center mt-1">Data update setiap saat</p>
                </div>
                <div class="flex flex-col items-center p-4 bg-white/60 backdrop-blur-sm rounded-2xl border border-white shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">Aman Terkendali</h3>
                    <p class="text-sm text-slate-500 text-center mt-1">Pengawasan 24 jam penuh</p>
                </div>
                <div class="flex flex-col items-center p-4 bg-white/60 backdrop-blur-sm rounded-2xl border border-white shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">Tarif Transparan</h3>
                    <p class="text-sm text-slate-500 text-center mt-1">Sesuai jenis kendaraan</p>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }
        .animation-delay-100 { animation-delay: 100ms; }
        .animation-delay-200 { animation-delay: 200ms; }
        .animation-delay-300 { animation-delay: 300ms; }
        .animation-delay-400 { animation-delay: 400ms; }
    </style>
@endsection