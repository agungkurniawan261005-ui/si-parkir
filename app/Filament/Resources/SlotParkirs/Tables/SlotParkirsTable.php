<?php

namespace App\Filament\Resources\SlotParkirs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SlotParkirsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_slot')
                    ->label('Kode Slot')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('status')
                    ->label('Status')
                    ->badge() // Membuat tampilan seperti label warna-warni
                    ->color(fn (string $state): string => match ($state) {
                        'Tersedia' => 'success', // Warna Hijau
                        'Terisi' => 'danger',   // Warna Merah
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
            ]);
    }
}