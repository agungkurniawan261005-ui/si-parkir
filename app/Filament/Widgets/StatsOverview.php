<?php

namespace App\Filament\Widgets;

use App\Models\Kendaraan;
use App\Models\SlotParkir;
use App\Models\Transaksi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $pendapatanHariIni = Transaksi::whereDate('waktu_keluar', Carbon::today())
            ->where('status', 'keluar')
            ->sum('total_bayar');

        $kendaraanAktif = Kendaraan::count();
        
        $slotTersedia = SlotParkir::where('status', 'kosong')->count();

        return [
            Stat::make('Pendapatan Hari Ini', 'Rp ' . number_format($pendapatanHariIni, 0, ',', '.'))
                ->description('Total transaksi selesai hari ini')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Kendaraan Aktif', $kendaraanAktif)
                ->description('Kendaraan yang sedang parkir')
                ->descriptionIcon('heroicon-m-truck')
                ->color('primary'),
            Stat::make('Slot Parkir Tersedia', $slotTersedia)
                ->description('Sisa slot kosong')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color($slotTersedia > 0 ? 'success' : 'danger'),
        ];
    }
}
