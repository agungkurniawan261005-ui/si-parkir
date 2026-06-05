<?php

namespace App\Filament\Resources\Transaksis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TransaksisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_kendaraan')
                    ->label('ID Kendaraan')
                    ->sortable(),

                TextColumn::make('id_slot')
                    ->label('ID Slot')
                    ->sortable(),

                TextColumn::make('waktu_masuk')
                    ->label('Waktu Masuk')
                    ->dateTime('d M Y, H:i') // Format: 01 Jan 2026, 14:30
                    ->sortable(),

                TextColumn::make('waktu_keluar')
                    ->label('Waktu Keluar')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),

                TextColumn::make('total_bayar')
                    ->label('Total Bayar')
                    ->money('IDR', locale: 'id') // Format Rp otomatis
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Masuk' => 'warning', // Warna Kuning/Oranye
                        'Keluar' => 'success', // Warna Hijau
                        default => 'gray',
                    }),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan nanti
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('waktu_masuk', 'desc'); // Otomatis mengurutkan dari transaksi terbaru
    }
}