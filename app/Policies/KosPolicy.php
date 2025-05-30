<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Kos;

class KosPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // semua boleh lihat list
    }

    public function view(User $user, Kos $kos): bool
    {
        return $user->isAdmin() || $kos->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return $user->isOwner() || $user->isAdmin();
    }

    public function update(User $user, Kos $kos): bool
    {
        return $user->isAdmin() || $kos->user_id === $user->id;
    }

    public function delete(User $user, Kos $kos): bool
    {
        return $user->isAdmin() || $kos->user_id === $user->id;
    }
}
