<?php

namespace App\Filament\Resources\Trainings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use App\Models\Pegawai;

class TrainingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('jenis_training_id')
                    ->required()
                    ->numeric(),
                TextInput::make('nama_training')
                    ->required(),
                TextInput::make('penyelenggara')
                    ->required(),
                DatePicker::make('tanggal_training')
                    ->required(),
                TextInput::make('lokasi')
                    ->required(),
                //tambahan repeater
                Repeater::make('peserta')
                    ->label('Peserta Training')
                    ->default([])
                    ->schema([
                        Select::make('pegawai_id')
                            ->label('Pegawai')
                            ->options(
                                Pegawai::query()
                                    ->pluck('nama', 'id')
                                    ->toArray()
                            )
                            ->searchable()
                            ->required(),
                        Select::make('status')
                            ->options([
                                'Terdaftar' => 'Terdaftar',
                                'Mengikuti' => 'Mengikuti',
                                'Selesai' => 'Selesai',
                            ])
                            ->required(),
                    ])
            ]);
    }
}
