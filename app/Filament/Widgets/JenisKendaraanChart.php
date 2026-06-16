<?php

namespace App\Filament\Widgets;

use App\Models\Kendaraan;
use Filament\Widgets\ChartWidget;

class JenisKendaraanChart extends ChartWidget
{
    protected ?string $heading = 'Proporsi Kendaraan Aktif';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $stats = Kendaraan::select('jenis_kendaraan')
            ->selectRaw('count(*) as total')
            ->groupBy('jenis_kendaraan')
            ->get();

        $labels = $stats->pluck('jenis_kendaraan')->map(fn ($jenis) => ucfirst($jenis))->toArray();
        $data = $stats->pluck('total')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah',
                    'data' => $data,
                    'backgroundColor' => [
                        '#3b82f6', // blue
                        '#10b981', // green
                        '#f59e0b', // amber
                        '#ef4444', // red
                        '#8b5cf6', // violet
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
