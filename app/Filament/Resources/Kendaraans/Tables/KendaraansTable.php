<?php

namespace App\Filament\Resources\Kendaraans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class KendaraansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('plat_nomor')
                    ->label('Plat Nomor')
                    ->searchable()
                    ->weight('bold'),
                    
                TextColumn::make('jenis_kendaraan')
                    ->label('Jenis Kendaraan')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->color(fn (string $state): string => match ($state) {
                        'motor' => 'info',
                        'mobil' => 'success',
                        'truk' => 'warning',
                        'bis' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                    
                TextColumn::make('pemilik')
                    ->label('Pemilik')
                    ->searchable(),
                    
                // Tampilkan nama tarif dari relasi, bukan angka ID
                TextColumn::make('tarif.jenis_kendaraan')
                    ->label('Tarif')
                    ->formatStateUsing(fn ($state, $record) => 
                        ucfirst($state) . ' — Rp ' . number_format($record->tarif?->tarif_per_jam ?? 0, 0, ',', '.')
                    )
                    ->badge()
                    ->color('gray'),
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
            ]);
    }
}