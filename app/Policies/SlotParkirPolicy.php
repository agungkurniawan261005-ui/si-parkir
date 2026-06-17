<?php

namespace App\Policies;

use App\Models\SlotParkir;
use App\Models\User;

class SlotParkirPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, SlotParkir $slotParkir): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, SlotParkir $slotParkir): bool
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, SlotParkir $slotParkir): bool
    {
        return $user->role === 'admin';
    }
}
