@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto bg-white/90 backdrop-blur-md shadow-xl rounded-2xl p-8 border border-slate-200">
        <h1 class="text-4xl font-bold text-blue-700 mb-6 text-center">Tentang SIPARK</h1>
        
        <div class="space-y-6 text-slate-600 leading-relaxed text-lg">
            <p>
                <strong>Sistem Informasi Parkir (SIPARK)</strong> adalah platform modern yang dirancang untuk memberikan kemudahan, keamanan, dan efisiensi dalam pengelolaan area parkir bagi masyarakat modern.
            </p>
            <p>
                Berawal dari kebutuhan akan pencatatan yang akurat dan transparan, SIPARK hadir dengan fitur pelacakan slot parkir secara langsung, keterbukaan informasi tarif, serta manajemen kendaraan berbasis teknologi <em>database</em> terpusat.
            </p>
            
            <div class="grid md:grid-cols-2 gap-6 mt-10">
                <div class="bg-blue-50 p-6 rounded-xl border border-blue-100 shadow-sm hover:shadow-md transition">
                    <h3 class="text-xl font-bold text-blue-700 mb-3 flex items-center gap-2">
                        <span>🎯</span> Visi Kami
                    </h3>
                    <p class="text-slate-600 text-base">Menjadi standar utama sistem manajemen parkir pintar (Smart Parking) yang responsif, andal, dan dapat diimplementasikan di berbagai institusi.</p>
                </div>
                <div class="bg-cyan-50 p-6 rounded-xl border border-cyan-100 shadow-sm hover:shadow-md transition">
                    <h3 class="text-xl font-bold text-cyan-700 mb-3 flex items-center gap-2">
                        <span>🚀</span> Misi Kami
                    </h3>
                    <p class="text-slate-600 text-base">Mewujudkan ekosistem parkir yang tertib, meminimalisir kesalahan pencatatan manual, dan memberikan pengalaman terbaik bagi pengguna ruang publik.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection