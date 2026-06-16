@extends('layouts.main')

@section('content')
    <style>
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(3deg); }
        }
        @keyframes float-slower {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-14px) rotate(-2deg); }
        }
        @keyframes pulse-ring {
            0% { transform: scale(1); opacity: 0.4; }
            50% { transform: scale(1.15); opacity: 0.1; }
            100% { transform: scale(1); opacity: 0.4; }
        }
        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        @keyframes fade-up {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-float-slow { animation: float-slow 6s ease-in-out infinite; }
        .animate-float-slower { animation: float-slower 8s ease-in-out infinite; }
        .animate-pulse-ring { animation: pulse-ring 3s ease-in-out infinite; }
        .animate-fade-up { animation: fade-up 0.8s ease-out both; }
        .animate-fade-up-delay-1 { animation: fade-up 0.8s ease-out 0.15s both; }
        .animate-fade-up-delay-2 { animation: fade-up 0.8s ease-out 0.3s both; }
        .animate-fade-up-delay-3 { animation: fade-up 0.8s ease-out 0.45s both; }
        .shimmer-text {
            background: linear-gradient(90deg, #2563eb 0%, #60a5fa 25%, #93c5fd 50%, #60a5fa 75%, #2563eb 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 4s linear infinite;
        }
    </style>

    <div class="relative flex flex-col items-center justify-center min-h-[75vh] overflow-hidden">

        {{-- Decorative background orbs --}}
        <div class="absolute top-[-80px] left-[-60px] w-72 h-72 bg-blue-400/10 rounded-full blur-3xl animate-float-slow pointer-events-none"></div>
        <div class="absolute bottom-[-100px] right-[-80px] w-96 h-96 bg-indigo-400/10 rounded-full blur-3xl animate-float-slower pointer-events-none"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-blue-500/5 rounded-full blur-3xl pointer-events-none"></div>

        {{-- Small floating decorative squares --}}
        <div class="absolute top-[15%] left-[10%] w-3 h-3 bg-blue-400/30 rounded-sm rotate-45 animate-float-slow pointer-events-none"></div>
        <div class="absolute top-[25%] right-[12%] w-2 h-2 bg-indigo-400/30 rounded-full animate-float-slower pointer-events-none"></div>
        <div class="absolute bottom-[20%] left-[15%] w-2.5 h-2.5 bg-sky-400/20 rounded-sm rotate-12 animate-float-slower pointer-events-none"></div>
        <div class="absolute bottom-[30%] right-[8%] w-3 h-3 bg-blue-300/20 rounded-full animate-float-slow pointer-events-none"></div>

        {{-- Pulse ring behind icon --}}
        <div class="absolute top-[calc(50%-160px)] left-1/2 -translate-x-1/2 w-28 h-28 rounded-full border-2 border-blue-400/20 animate-pulse-ring pointer-events-none"></div>

        {{-- Icon / Logo area --}}
        <div class="animate-fade-up mb-6 relative z-10">
            <div class="w-20 h-20 mx-auto rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 shadow-lg shadow-blue-500/30 flex items-center justify-center">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                </svg>
            </div>
        </div>

        {{-- Title --}}
        <h1 class="animate-fade-up-delay-1 text-5xl md:text-6xl font-extrabold shimmer-text mb-3 tracking-tight text-center relative z-10">
            SI Parkir
        </h1>

        {{-- Subtitle --}}
        <p class="animate-fade-up-delay-1 text-lg md:text-xl mb-10 text-center max-w-xl leading-relaxed text-gray-500 relative z-10">
            Sistem manajemen parkir yang <span class="font-semibold text-gray-700">aman</span> dan <span class="font-semibold text-gray-700">terpercaya</span>. Temukan kenyamanan memarkirkan kendaraan Anda bersama kami.
        </p>

        {{-- Buttons --}}
        <div class="animate-fade-up-delay-2 flex flex-wrap justify-center gap-4 relative z-10">
            <a href="/cek-slot"
               class="group relative px-7 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:scale-[1.03] active:scale-[0.98] transition-all duration-200 overflow-hidden">
                <span class="relative z-10 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    Cek Slot Parkir
                </span>
                <span class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
            </a>

            <a href="/informasi-tarif"
               class="group relative px-7 py-3 bg-gradient-to-r from-emerald-500 to-teal-500 text-white font-semibold rounded-xl shadow-lg shadow-emerald-500/25 hover:shadow-emerald-500/45 hover:scale-[1.03] active:scale-[0.98] transition-all duration-200 overflow-hidden">
                <span class="relative z-10 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>
                    Informasi Tarif
                </span>
                <span class="absolute inset-0 bg-gradient-to-r from-teal-500 to-emerald-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
            </a>

            <a href="/lacak-parkir"
               class="group relative px-7 py-3 bg-white/80 backdrop-blur-sm text-blue-600 font-semibold border border-blue-200 rounded-xl shadow-md shadow-blue-500/10 hover:shadow-blue-500/20 hover:scale-[1.03] active:scale-[0.98] hover:border-blue-300 transition-all duration-200">
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    Lacak Kendaraan
                </span>
            </a>
        </div>

        {{-- Bottom subtle stats strip --}}
        <div class="animate-fade-up-delay-3 mt-14 flex items-center gap-8 text-sm text-gray-400 relative z-10">
            <div class="flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                Sistem Aktif
            </div>
            <div class="w-px h-4 bg-gray-200"></div>
            <div class="flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                </svg>
                Keamanan 24/7
            </div>
            <div class="w-px h-4 bg-gray-200"></div>
            <div class="flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                </svg>
                Respons Cepat
            </div>
        </div>
    </div>
@endsection