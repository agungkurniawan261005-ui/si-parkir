<?php

namespace App\Filament\Widgets;

use App\Models\Transaksi;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class PendapatanChart extends ChartWidget
{
    protected ?string $heading = 'Pendapatan 7 Hari Terakhir';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = [];
        $labels = [];

        $period = CarbonPeriod::create(Carbon::now()->subDays(6), Carbon::now());

        foreach ($period as $date) {
            $formattedDate = $date->format('Y-m-d');
            $labels[] = $date->format('d M');
            $pendapatan = Transaksi::whereDate('waktu_keluar', $formattedDate)
                ->where('status', 'keluar')
                ->sum('total_bayar');
            $data[] = $pendapatan;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan (Rp)',
                    'data' => $data,
                    'fill' => 'start',
                    'borderColor' => '#10b981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.2)',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
