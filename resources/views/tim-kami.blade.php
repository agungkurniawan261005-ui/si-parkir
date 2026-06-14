@extends('layouts.main')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">
    <div class="text-center mb-16 animate-fade-in-up">
        <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 tracking-tight mb-6">Tim <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-cyan-500">Pengembang</span></h1>
        <p class="text-lg text-slate-600 max-w-2xl mx-auto font-medium">Mengenal lebih dekat orang-orang hebat di balik pengembangan SIPARK.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8">
        
        <!-- Member 1 -->
        <div class="group bg-white/80 backdrop-blur-xl rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden transform transition-all hover:-translate-y-2 hover:shadow-xl hover:shadow-brand-500/10 duration-300 animate-fade-in-up">
            <div class="h-32 bg-gradient-to-r from-brand-600 to-cyan-500 relative overflow-hidden">
                <!-- Decorative background pattern -->
                <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 16px 16px;"></div>
            </div>
            <div class="flex justify-center -mt-16 relative z-10">
                <div class="relative">
                    <div class="absolute inset-0 bg-brand-500 rounded-full blur group-hover:blur-md transition-all opacity-50"></div>
                    <img src="https://ui-avatars.com/api/?name=Agung+Kurniawan&background=0f172a&color=fff&size=128" alt="Profil Agung Kurniawan" class="w-32 h-32 rounded-full border-4 border-white object-cover relative z-10">
                </div>
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-bold text-slate-800 mb-1">Agung Kurniawan</h3>
                <p class="text-brand-600 font-semibold text-sm uppercase tracking-wider mb-4">Project Manager / Backend</p>
                <div class="bg-slate-50 text-slate-500 text-xs py-1.5 px-4 rounded-full inline-block font-mono border border-slate-100 shadow-inner">NIM: 0110125049</div>
            </div>
        </div>

        <!-- Member 2 -->
        <div class="group bg-white/80 backdrop-blur-xl rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden transform transition-all hover:-translate-y-2 hover:shadow-xl hover:shadow-brand-500/10 duration-300 animate-fade-in-up animation-delay-100">
            <div class="h-32 bg-gradient-to-r from-cyan-500 to-blue-500 relative overflow-hidden">
                <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 16px 16px;"></div>
            </div>
            <div class="flex justify-center -mt-16 relative z-10">
                <div class="relative">
                    <div class="absolute inset-0 bg-cyan-500 rounded-full blur group-hover:blur-md transition-all opacity-50"></div>
                    <img src="https://ui-avatars.com/api/?name=Nama+Anggota2&background=0D8ABC&color=fff&size=128" alt="Profil Anggota 2" class="w-32 h-32 rounded-full border-4 border-white object-cover relative z-10">
                </div>
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-bold text-slate-800 mb-1">Nama Anggota 2</h3>
                <p class="text-brand-600 font-semibold text-sm uppercase tracking-wider mb-4">System Analyst</p>
                <div class="bg-slate-50 text-slate-500 text-xs py-1.5 px-4 rounded-full inline-block font-mono border border-slate-100 shadow-inner">NIM: 0110125xxx</div>
            </div>
        </div>

        <!-- Member 3 -->
        <div class="group bg-white/80 backdrop-blur-xl rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden transform transition-all hover:-translate-y-2 hover:shadow-xl hover:shadow-brand-500/10 duration-300 animate-fade-in-up animation-delay-200">
            <div class="h-32 bg-gradient-to-r from-blue-500 to-indigo-500 relative overflow-hidden">
                <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 16px 16px;"></div>
            </div>
            <div class="flex justify-center -mt-16 relative z-10">
                <div class="relative">
                    <div class="absolute inset-0 bg-blue-500 rounded-full blur group-hover:blur-md transition-all opacity-50"></div>
                    <img src="https://ui-avatars.com/api/?name=Nama+Anggota3&background=3b82f6&color=fff&size=128" alt="Profil Anggota 3" class="w-32 h-32 rounded-full border-4 border-white object-cover relative z-10">
                </div>
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-bold text-slate-800 mb-1">Nama Anggota 3</h3>
                <p class="text-brand-600 font-semibold text-sm uppercase tracking-wider mb-4">Frontend Developer</p>
                <div class="bg-slate-50 text-slate-500 text-xs py-1.5 px-4 rounded-full inline-block font-mono border border-slate-100 shadow-inner">NIM: 0110125xxx</div>
            </div>
        </div>

        <!-- Member 4 -->
        <div class="group bg-white/80 backdrop-blur-xl rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden transform transition-all hover:-translate-y-2 hover:shadow-xl hover:shadow-brand-500/10 duration-300 animate-fade-in-up animation-delay-300">
            <div class="h-32 bg-gradient-to-r from-indigo-500 to-purple-500 relative overflow-hidden">
                <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 16px 16px;"></div>
            </div>
            <div class="flex justify-center -mt-16 relative z-10">
                <div class="relative">
                    <div class="absolute inset-0 bg-indigo-500 rounded-full blur group-hover:blur-md transition-all opacity-50"></div>
                    <img src="https://ui-avatars.com/api/?name=Nama+Anggota4&background=6366f1&color=fff&size=128" alt="Profil Anggota 4" class="w-32 h-32 rounded-full border-4 border-white object-cover relative z-10">
                </div>
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-bold text-slate-800 mb-1">Nama Anggota 4</h3>
                <p class="text-brand-600 font-semibold text-sm uppercase tracking-wider mb-4">UI/UX Designer</p>
                <div class="bg-slate-50 text-slate-500 text-xs py-1.5 px-4 rounded-full inline-block font-mono border border-slate-100 shadow-inner">NIM: 0110125xxx</div>
            </div>
        </div>

        <!-- Member 5 -->
        <div class="group bg-white/80 backdrop-blur-xl rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden transform transition-all hover:-translate-y-2 hover:shadow-xl hover:shadow-brand-500/10 duration-300 animate-fade-in-up animation-delay-400">
            <div class="h-32 bg-gradient-to-r from-purple-500 to-pink-500 relative overflow-hidden">
                <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 16px 16px;"></div>
            </div>
            <div class="flex justify-center -mt-16 relative z-10">
                <div class="relative">
                    <div class="absolute inset-0 bg-purple-500 rounded-full blur group-hover:blur-md transition-all opacity-50"></div>
                    <img src="https://ui-avatars.com/api/?name=Nama+Anggota5&background=a855f7&color=fff&size=128" alt="Profil Anggota 5" class="w-32 h-32 rounded-full border-4 border-white object-cover relative z-10">
                </div>
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-bold text-slate-800 mb-1">Nama Anggota 5</h3>
                <p class="text-brand-600 font-semibold text-sm uppercase tracking-wider mb-4">Database Admin</p>
                <div class="bg-slate-50 text-slate-500 text-xs py-1.5 px-4 rounded-full inline-block font-mono border border-slate-100 shadow-inner">NIM: 0110125xxx</div>
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
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }
    .animation-delay-100 { animation-delay: 100ms; }
    .animation-delay-200 { animation-delay: 200ms; }
    .animation-delay-300 { animation-delay: 300ms; }
    .animation-delay-400 { animation-delay: 400ms; }
</style>
@endsection