<?php

namespace App\Filament\Pages\Auth;

// Tambahkan TextInput di sini
use Filament\Forms\Components\TextInput; 
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Illuminate\Support\Facades\Hash;

class EditProfile extends BaseEditProfile
{
    protected function getFormSchema(): array
    {
        return array_merge(parent::getFormSchema(), [
            // Tambahkan field untuk nama, email, dan password
            
                // Cara Manual (Bebas dari garis merah VS Code)
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $operation): bool => $operation === 'create'),
                
                // Form Upload Foto Profil
                FileUpload::make('avatar_url')
                    ->label('Foto Profil')
                    ->avatar()
                    ->imageEditor()
                    ->circleCropper()
                    ->directory('avatars')
            ]);
    }
}