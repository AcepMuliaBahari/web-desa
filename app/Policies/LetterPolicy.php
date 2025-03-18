<?php

namespace App\Policies;

use App\Models\Letter;
use App\Models\User;

class LetterPolicy
{
    public function view(User $user, Letter $letter)
    {
        return $user->id === $letter->user_id || $user->role === 'admin';
    }

    public function process(User $user, Letter $letter)
    {
        return $user->role === 'admin' && $letter->status === 'pending';
    }

    public function complete(User $user, Letter $letter)
    {
        return $user->role === 'admin' && $letter->status === 'processed';
    }

    public function delete(User $user, Letter $letter)
    {
        return $user->id === $letter->user_id && $letter->status === 'pending';
    }
} 