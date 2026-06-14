@extends('layouts.main')

@section('content')
    <div class="max-w-4xl mx-auto w-full px-4 sm:px-6 py-12">
        <div class="bg-white/80 backdrop-blur-xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] rounded-3xl p-8 sm:p-12 border border-slate-100 animate-fade-in-up">
            
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-brand-50 text-brand-600 mb-6 shadow-sm">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h1 class="text-4xl sm:text-5xl font-extrabold text-slate-800 tracking-tight mb-6">Tentang <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-cyan-500">SIPARK</span></h1>
                <div class="h-1 w-20 bg-gradient-to-r from-brand-500 to-cyan-500 rounded-full mx-auto"></div>
            </div>
            
            <div class="prose prose-lg prose-slate max-w-none mb-16 text-center">
                <p class="text-xl text-slate-600 leading-relaxed mb-6 font-medium">
                    Sistem Informasi Parkir (SIPARK) adalah platform modern yang dirancang untuk memberikan kemudahan, keamanan, dan efisiensi dalam pengelolaan area parkir bagi masyarakat modern.
                </p>
                <p class="text-slate-500 leading-relaxed">
                    Berawal dari kebutuhan akan pencatatan yang akurat dan transparan, SIPARK hadir dengan fitur pelacakan slot parkir secara langsung, keterbukaan informasi tarif, serta manajemen kendaraan berbasis teknologi <span class="text-brand-600 font-semibold bg-brand-50 px-2 py-0.5 rounded">database terpusat</span>.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Visi Card -->
                <div class="group relative bg-gradient-to-br from-brand-50 to-white p-8 rounded-3xl border border-brand-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-brand-100 rounded-full blur-2xl group-hover:bg-brand-200 transition-colors"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-brand-100 text-brand-600 rounded-xl flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-4">Visi Kami</h3>
                        <p class="text-slate-600 leading-relaxed">Menjadi standar utama sistem manajemen parkir pintar (<em class="text-brand-600 font-medium">Smart Parking</em>) yang responsif, andal, dan dapat diimplementasikan di berbagai institusi.</p>
                    </div>
                </div>

                <!-- Misi Card -->
                <div class="group relative bg-gradient-to-br from-cyan-50 to-white p-8 rounded-3xl border border-cyan-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-cyan-100 rounded-full blur-2xl group-hover:bg-cyan-200 transition-colors"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-cyan-100 text-cyan-600 rounded-xl flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-4">Misi Kami</h3>
                        <p class="text-slate-600 leading-relaxed">Mewujudkan ekosistem parkir yang tertib, meminimalisir kesalahan pencatatan manual, dan memberikan pengalaman terbaik bagi pengguna ruang publik.</p>
                    </div>
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
    </style>
@endsection