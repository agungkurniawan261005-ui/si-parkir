<?php

namespace App\Filament\Widgets;

use App\Models\Transaksi;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TransaksiTerbaru extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Transaksi Masuk Terbaru';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Transaksi::query()
                    ->with(['kendaraan' => fn ($q) => $q->withTrashed()])
                    ->latest('waktu_masuk')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('kendaraan.plat_nomor')
                    ->label('Plat Nomor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kendaraan.jenis_kendaraan')
                    ->label('Jenis')
                    ->formatStateUsing(fn ($state) => ucfirst($state)),
                Tables\Columns\TextColumn::make('waktu_masuk')
                    ->label('Waktu Masuk')
                    ->dateTime('d M Y, H:i'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'masuk' => 'primary',
                        'keluar' => 'success',
                        default => 'secondary',
                    })
                    ->formatStateUsing(fn ($state) => ucfirst($state)),
            ])
            ->paginated(false);
    }
}
