@extends('layouts.main')

@section('content')
    <div class="max-w-3xl mx-auto w-full px-4 sm:px-6 py-8 flex flex-col items-center">
        
        <div class="text-center mb-10 animate-fade-in-up w-full">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Lacak <span class="text-brand-600">Kendaraan Anda</span></h2>
            <p class="text-slate-500">Masukkan nomor polisi (plat) kendaraan Anda untuk mengecek status dan estimasi biaya parkir secara real-time.</p>
        </div>

        <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-8 w-full mb-10 animate-fade-in-up animation-delay-100">
            <form action="/lacak-parkir" method="GET" class="flex flex-col sm:flex-row gap-4 relative">
                <div class="relative flex-grow">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-6 w-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="plat_nomor" value="{{ request('plat_nomor') }}" placeholder="Contoh: B 1234 XYZ" 
                           class="w-full pl-12 pr-4 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:bg-white focus:border-brand-500 focus:outline-none focus:ring-4 focus:ring-brand-500/10 text-xl font-bold uppercase transition-all" required>
                </div>
                <button type="submit" class="bg-brand-600 text-white px-10 py-4 rounded-2xl font-bold hover:bg-brand-700 transition-colors shadow-lg shadow-brand-500/30 flex items-center justify-center gap-2 group">
                    CARI
                    <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </form>
        </div>

        @if($platNomor)
            <div class="w-full animate-fade-in-up animation-delay-200">
                @if(!$kendaraan)
                    <div class="bg-rose-50 border-2 border-rose-100 rounded-2xl p-6 flex items-start gap-4 shadow-sm">
                        <div class="bg-white p-2 rounded-full shadow-sm text-rose-500 flex-shrink-0 mt-1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-rose-800 font-bold text-lg mb-1">Kendaraan Tidak Ditemukan</h3>
                            <p class="text-rose-600">Kendaraan dengan plat nomor <span class="uppercase font-bold bg-white px-2 py-0.5 rounded shadow-sm">{{ $platNomor }}</span> tidak ada dalam sistem kami. Silakan periksa kembali nomor yang Anda masukkan.</p>
                        </div>
                    </div>
                @elseif(!$transaksi)
                    <div class="bg-amber-50 border-2 border-amber-100 rounded-2xl p-6 flex items-start gap-4 shadow-sm">
                        <div class="bg-white p-2 rounded-full shadow-sm text-amber-500 flex-shrink-0 mt-1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-amber-800 font-bold text-lg mb-1">Status: Tidak Parkir</h3>
                            <p class="text-amber-700">Kendaraan <span class="uppercase font-bold bg-white px-2 py-0.5 rounded shadow-sm">{{ $platNomor }}</span> saat ini tidak terdaftar berada di dalam area parkir (Sudah Keluar/Belum Masuk).</p>
                        </div>
                    </div>
                @else
                    <!-- Ticket Design -->
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100 relative">
                        <!-- Top Accent -->
                        <div class="bg-emerald-500 px-6 py-4 flex items-center justify-between">
                            <div class="flex items-center gap-2 text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="font-bold tracking-widest text-sm">SEDANG PARKIR</span>
                            </div>
                            <span class="text-emerald-100 text-xs uppercase font-mono tracking-widest">ID: #{{ str_pad($transaksi->id, 5, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        
                        <!-- Ticket Pattern -->
                        <div class="absolute left-0 right-0 top-[60px] h-4 flex justify-between px-4">
                            <div class="w-4 h-4 bg-slate-50/50 rounded-full -ml-6 border-r border-slate-100"></div>
                            <div class="w-4 h-4 bg-slate-50/50 rounded-full -mr-6 border-l border-slate-100"></div>
                        </div>
                        <div class="absolute left-6 right-6 top-[68px] border-t-2 border-dashed border-slate-200"></div>

                        <div class="p-8 pt-10">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8">
                                <div>
                                    <p class="text-sm text-slate-400 font-medium uppercase tracking-wider mb-1">Nomor Polisi</p>
                                    <div class="inline-block bg-slate-900 text-white px-4 py-2 rounded-lg font-mono text-2xl font-bold tracking-wider shadow-inner">
                                        {{ $kendaraan->plat_nomor }}
                                    </div>
                                </div>
                                <div class="text-left md:text-right">
                                    <p class="text-sm text-slate-400 font-medium uppercase tracking-wider mb-1">Jenis Kendaraan</p>
                                    <div class="flex items-center md:justify-end gap-2 text-slate-800">
                                        <span class="text-2xl">
                                            @if(strtolower($kendaraan->jenis_kendaraan) == 'motor') 🏍️
                                            @elseif(strtolower($kendaraan->jenis_kendaraan) == 'mobil') 🚗
                                            @elseif(strtolower($kendaraan->jenis_kendaraan) == 'truk') 🚚
                                            @else 🚙 @endif
                                        </span>
                                        <span class="text-xl font-bold capitalize">{{ $kendaraan->jenis_kendaraan }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4 mb-8">
                                <div class="flex justify-between items-center bg-slate-50 p-4 rounded-xl border border-slate-100">
                                    <div class="flex items-center gap-3">
                                        <div class="bg-white p-2 rounded-lg text-brand-500 shadow-sm">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                                        </div>
                                        <span class="text-slate-600 font-medium">Waktu Masuk</span>
                                    </div>
                                    <span class="font-bold text-slate-800">{{ \Carbon\Carbon::parse($transaksi->waktu_masuk)->format('d M Y, H:i') }} WIB</span>
                                </div>
                                <div class="flex justify-between items-center bg-slate-50 p-4 rounded-xl border border-slate-100">
                                    <div class="flex items-center gap-3">
                                        <div class="bg-white p-2 rounded-lg text-brand-500 shadow-sm">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </div>
                                        <span class="text-slate-600 font-medium">Durasi Parkir</span>
                                    </div>
                                    <span class="font-bold text-brand-600 text-lg">{{ $durasiJam }} Jam</span>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-brand-50 to-cyan-50 p-6 rounded-2xl border border-brand-100/50 flex flex-col items-center justify-center text-center">
                                <span class="text-brand-800 font-semibold text-sm uppercase tracking-widest mb-2">Estimasi Biaya Sementara</span>
                                <div class="flex items-start justify-center gap-1">
                                    <span class="text-brand-600 font-bold mt-1">Rp</span>
                                    <span class="font-black text-5xl text-transparent bg-clip-text bg-gradient-to-r from-brand-700 to-cyan-600">{{ number_format($estimasiBiaya, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            
                            <div class="mt-6 flex items-start gap-2 justify-center text-center">
                                <svg class="w-4 h-4 text-slate-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <p class="text-xs text-slate-400">Biaya akhir dapat berubah bergantung pada waktu aktual kendaraan meninggalkan gerbang parkir.</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endif

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