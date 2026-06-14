<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('email')
                    ->label('Alamat Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('password')
                    ->label('Kata Sandi')
                    ->password()
                    // Mengenkripsi password secara otomatis
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    // Mencegah password tertimpa kosong saat admin mengedit data lain
                    ->dehydrated(fn ($state) => filled($state))
                    // Wajib diisi hanya saat membuat user baru
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->maxLength(255),

                FileUpload::make('avatar_url')
                    ->label('Foto Profil')
                    ->avatar()
                    ->imageEditor()
                    ->circleCropper()
                    ->directory('avatars')
            ]);
    }
}