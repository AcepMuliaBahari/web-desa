<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VillageRegulation;
use Illuminate\Auth\Access\HandlesAuthorization;

class VillageRegulationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function view(User $user, VillageRegulation $regulation): bool
    {
        return $user->role === 'admin';
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, VillageRegulation $regulation): bool
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, VillageRegulation $regulation): bool
    {
        return $user->role === 'admin';
    }
} 