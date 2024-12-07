<?php

namespace App\Policies;

use App\Models\User;
use App\Models\job;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    /**
     * Perform preliminary checks before any other authorization methods.
     * Grants all permissions to super admins, admins, C Suite Staff, and HR Staff.
     */
    public function before(User $user)
    {
        if ($user->isSuperAdmin() || $user->isAdmin() || $user->cSuite() || $user->hrStaff()) {
            return true;
        }
    }
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
    public function view(User $user, job $job): bool
    {
        return false;
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
    public function update(User $user, job $job): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, job $job): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, job $job): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, job $job): bool
    {
        return false;
    }
}
