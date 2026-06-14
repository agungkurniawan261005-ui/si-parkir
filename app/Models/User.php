<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName; // 1. Tambahkan ini
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements FilamentUser, HasName, HasAvatar // 2. Tambahkan HasName dan HasAvatar di sini
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    
    protected $primaryKey = 'id_user';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return true; 
    }

    // 3. Tambahkan fungsi ini untuk memberi tahu Filament nama kolom Anda
    public function getFilamentName(): string
    {
        // Menggunakan kolom 'nama' dari database db_parkir
        return $this->nama; 
    }

    // 4. Tambahkan fungsi ini untuk memberi tahu Filament URL avatar Anda
    public function getFilamentAvatarUrl(): ?string
    {
        // Menggunakan kolom 'avatar_url' dari database db_parkir
        return $this->avatar_url ? Storage::url($this->avatar_url) : null;
    }
}