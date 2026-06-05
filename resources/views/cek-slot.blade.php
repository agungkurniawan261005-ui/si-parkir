@extends('layouts.main')

@section('content')
<div class="container mx-auto p-6 mt-6">
        <h2 class="text-3xl font-bold text-center mb-8">Ketersediaan Slot Parkir</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white rounded-xl shadow-sm p-6 text-center border-b-4 border-blue-500">
                <h3 class="text-lg font-semibold text-gray-500 uppercase tracking-wider">Total Slot</h3>
                <p class="text-5xl font-bold text-blue-600 mt-2">{{ $total }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 text-center border-b-4 border-green-500">
                <h3 class="text-lg font-semibold text-gray-500 uppercase tracking-wider">Tersedia</h3>
                <p class="text-5xl font-bold text-green-500 mt-2">{{ $tersedia }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 text-center border-b-4 border-red-500">
                <h3 class="text-lg font-semibold text-gray-500 uppercase tracking-wider">Terisi</h3>
                <p class="text-5xl font-bold text-red-500 mt-2">{{ $terisi }}</p>
            </div>
        </div>

        <h3 class="text-xl font-bold mb-4 text-gray-700 border-b pb-2">Detail Slot (Denah)</h3>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach($slots as $slot)
                <div class="p-4 rounded-xl shadow-sm text-center font-bold text-white transition transform hover:scale-105
                    {{ $slot->status == 'Tersedia' ? 'bg-green-500' : 'bg-red-500' }}">
                    <span class="block text-3xl">{{ $slot->kode_slot }}</span>
                    <span class="block text-sm font-normal mt-1 bg-black bg-opacity-20 rounded py-1 px-2 mx-auto w-max">
                        {{ $slot->status }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@endsection