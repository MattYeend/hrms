<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Notes;
use Illuminate\Auth\Access\Response;

class NotesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isSuperAdmin() || $user->isAdmin() || $user->hrStaff();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Notes $notes): bool
    {
        return $user->isSuperAdmin() || $user->isAdmin() || $user->hrStaff() || $user->id === $note->created_by;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isSuperAdmin() || $user->isAdmin() || $user->hrStaff();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Notes $notes): bool
    {
        return $user->isSuperAdmin() || $user->isAdmin() || $user->id === $note->created_by;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Notes $notes): bool
    {
        return $user->isSuperAdmin() || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Notes $notes): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Notes $notes): bool
    {
        return false;
    }
}
