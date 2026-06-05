@extends('layouts.main')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-[70vh]">
        <h1 class="text-4xl font-bold text-blue-600 mb-4">Selamat Datang di SI Parkir</h1>
        <p class="text-lg mb-8 text-center max-w-lg">Sistem manajemen parkir yang aman dan terpercaya. Temukan kenyamanan memarkirkan kendaraan Anda bersama kami.</p>
        
        <div class="flex flex-wrap justify-center gap-4">
            <a href="/cek-slot" class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">Cek Slot Parkir</a>
            <a href="/informasi-tarif" class="px-6 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 transition">Informasi Tarif</a>
            <a href="/lacak-parkir" class="px-6 py-2 bg-white text-blue-600 border border-blue-600 rounded-lg shadow hover:bg-gray-50 transition">Lacak Kendaraan</a>
        </div>
    </div>
@endsection