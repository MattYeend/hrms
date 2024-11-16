<?php

namespace App\Policies;

use App\Models\Rotas;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RotasPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Rotas $rotas): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $authUser, ?User $user = null): bool
    {
        return $authUser->isAdmin() || $authUser->isSuperAdmin() ||
                ($authUser->department && $authUser->department->dept_lead_id === $user->id);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $authUser, Rotas $rotas): bool
    {
        return $authUser->isAdmin() || $authUser->isSuperAdmin() ||
                ($authUser->department && $authUser->department->dept_lead_id === $rotas->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $authUser, User $user): bool
    {
        return $authUser->isSuperAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Rotas $rotas): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Rotas $rotas): bool
    {
        //
    }
}
