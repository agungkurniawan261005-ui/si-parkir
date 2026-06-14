@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-16">
        <h1 class="text-4xl font-bold text-blue-700 mb-4">Tim Pengembang</h1>
        <p class="text-lg text-slate-700 bg-white/70 backdrop-blur-sm inline-block px-6 py-2 rounded-full border border-white">Mengenal lebih dekat orang-orang hebat di balik SIPARK.</p>
    </div>

    <div class="flex flex-wrap justify-center gap-8">
        
        <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-lg border border-slate-200 overflow-hidden w-64 transform transition hover:-translate-y-2 hover:shadow-2xl duration-300">
            <div class="h-28 bg-gradient-to-r from-blue-600 to-cyan-500"></div>
            <div class="flex justify-center -mt-14">
                <img src="https://ui-avatars.com/api/?name=Agung+Kurniawan&background=0f172a&color=fff&size=128" alt="Profil" class="w-28 h-28 rounded-full border-4 border-white object-cover shadow-sm">
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-bold text-slate-800">Agung Kurniawan</h3>
                <p class="text-cyan-600 font-semibold mb-2">Project Manager / Backend</p>
                <div class="bg-slate-100 text-slate-600 text-sm py-1 px-3 rounded-md inline-block font-mono">NIM: 0110125049</div>
            </div>
        </div>

        <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-lg border border-slate-200 overflow-hidden w-64 transform transition hover:-translate-y-2 hover:shadow-2xl duration-300">
            <div class="h-28 bg-gradient-to-r from-blue-500 to-cyan-400"></div>
            <div class="flex justify-center -mt-14">
                <img src="https://ui-avatars.com/api/?name=Nama+Anggota2&background=0D8ABC&color=fff&size=128" alt="Profil" class="w-28 h-28 rounded-full border-4 border-white object-cover shadow-sm">
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-bold text-slate-800">Nama Anggota 2</h3>
                <p class="text-blue-600 font-semibold mb-2">System Analyst</p>
                <div class="bg-slate-100 text-slate-600 text-sm py-1 px-3 rounded-md inline-block font-mono">NIM: 0110125xxx</div>
            </div>
        </div>

        <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-lg border border-slate-200 overflow-hidden w-64 transform transition hover:-translate-y-2 hover:shadow-2xl duration-300">
            <div class="h-28 bg-gradient-to-r from-blue-500 to-cyan-400"></div>
            <div class="flex justify-center -mt-14">
                <img src="https://ui-avatars.com/api/?name=Nama+Anggota3&background=0D8ABC&color=fff&size=128" alt="Profil" class="w-28 h-28 rounded-full border-4 border-white object-cover shadow-sm">
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-bold text-slate-800">Nama Anggota 3</h3>
                <p class="text-blue-600 font-semibold mb-2">Frontend Developer</p>
                <div class="bg-slate-100 text-slate-600 text-sm py-1 px-3 rounded-md inline-block font-mono">NIM: 0110125xxx</div>
            </div>
        </div>

        <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-lg border border-slate-200 overflow-hidden w-64 transform transition hover:-translate-y-2 hover:shadow-2xl duration-300">
            <div class="h-28 bg-gradient-to-r from-blue-500 to-cyan-400"></div>
            <div class="flex justify-center -mt-14">
                <img src="https://ui-avatars.com/api/?name=Nama+Anggota4&background=0D8ABC&color=fff&size=128" alt="Profil" class="w-28 h-28 rounded-full border-4 border-white object-cover shadow-sm">
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-bold text-slate-800">Nama Anggota 4</h3>
                <p class="text-blue-600 font-semibold mb-2">UI/UX Designer</p>
                <div class="bg-slate-100 text-slate-600 text-sm py-1 px-3 rounded-md inline-block font-mono">NIM: 0110125xxx</div>
            </div>
        </div>

        <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-lg border border-slate-200 overflow-hidden w-64 transform transition hover:-translate-y-2 hover:shadow-2xl duration-300">
            <div class="h-28 bg-gradient-to-r from-blue-500 to-cyan-400"></div>
            <div class="flex justify-center -mt-14">
                <img src="https://ui-avatars.com/api/?name=Nama+Anggota5&background=0D8ABC&color=fff&size=128" alt="Profil" class="w-28 h-28 rounded-full border-4 border-white object-cover shadow-sm">
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-bold text-slate-800">Nama Anggota 5</h3>
                <p class="text-blue-600 font-semibold mb-2">Database Admin</p>
                <div class="bg-slate-100 text-slate-600 text-sm py-1 px-3 rounded-md inline-block font-mono">NIM: 0110125xxx</div>
            </div>
        </div>

    </div>
</div>
@endsection