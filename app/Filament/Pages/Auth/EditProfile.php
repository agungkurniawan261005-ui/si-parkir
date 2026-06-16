<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\TextInput; 
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Illuminate\Support\Facades\Hash;

class EditProfile extends BaseEditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                
                // Form Upload Foto Profil
                FileUpload::make('avatar_url')
                    ->label('Foto Profil')
                    ->avatar()
                    ->imageEditor()
                    ->circleCropper()
                    ->disk('public')
                    ->directory('avatars')
            ]);
    }
}