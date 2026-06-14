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
                // Tampilkan plat nomor dari relasi kendaraan
                TextColumn::make('kendaraan.plat_nomor')
                    ->label('Kendaraan')
                    ->description(fn ($record) => $record->kendaraan?->pemilik)
                    ->searchable()
                    ->sortable(),

                // Tampilkan kode slot dari relasi slotParkir
                TextColumn::make('slotParkir.kode_slot')
                    ->label('Slot Parkir')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('waktu_masuk')
                    ->label('Waktu Masuk')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),

                TextColumn::make('waktu_keluar')
                    ->label('Waktu Keluar')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->placeholder('— Belum keluar —'),

                TextColumn::make('total_bayar')
                    ->label('Total Bayar')
                    ->money('IDR', locale: 'id')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->color(fn (string $state): string => match (strtolower($state)) {
                        'masuk' => 'warning',
                        'keluar' => 'success',
                        default => 'gray',
                    }),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('waktu_masuk', 'desc');
    }
}