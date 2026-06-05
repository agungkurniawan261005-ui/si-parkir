<?php

namespace App\Filament\Resources\Tarifs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TarifsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jenis_kendaraan')
                    ->label('Jenis Kendaraan')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('tarif_per_jam')
                    ->label('Tarif per Jam')
                    ->money('IDR', locale: 'id') // Otomatis mengubah angka jadi format Rp 5.000,00
                    ->sortable(),
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