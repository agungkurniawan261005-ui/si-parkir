<?php

namespace App\Policies;

use App\Models\Tarif;
use App\Models\User;

class TarifPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Tarif $tarif): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Tarif $tarif): bool
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Tarif $tarif): bool
    {
        return $user->role === 'admin';
    }
}
