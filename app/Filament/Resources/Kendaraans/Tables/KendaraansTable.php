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
                    ->searchable(),
                    
                TextColumn::make('jenis_kendaraan')
                    ->label('Jenis Kendaraan')
                    ->sortable(),
                    
                TextColumn::make('pemilik')
                    ->label('Pemilik')
                    ->searchable(),
                    
                TextColumn::make('id_tarif')
                    ->label('ID Tarif'),
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