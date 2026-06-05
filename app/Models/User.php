<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName; // 1. Tambahkan ini
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser, HasName // 2. Tambahkan HasName di sini
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
}