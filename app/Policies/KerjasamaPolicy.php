<?php

namespace App\Policies;

use App\Models\Kerjasama;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KerjasamaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Kerjasama $kerjasama): bool
    {
        return $user->id === $kerjasama->pelanggan->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Kerjasama $kerjasama): bool
    {
        return $user->id === $kerjasama->pelanggan->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Kerjasama $kerjasama): bool
    {
        return $user->id === $kerjasama->pelanggan->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Kerjasama $kerjasama): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Kerjasama $kerjasama): bool
    {
        return false;
    }
}
