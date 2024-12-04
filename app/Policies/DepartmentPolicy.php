<?php

namespace App\Policies;

use App\Models\User;
use App\Models\department;
use Illuminate\Auth\Access\Response;

class DepartmentPolicy
{
        /**
     * Perform preliminary checks before any other authorization methods.
     * Grants all permissions to super admins, admins and C Suite staff.
     */
    public function before(User $user)
    {
        if ($user->isSuperAdmin() || $user->isAdmin() || $user->cSuite()) {
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
    public function view(User $user, department $department): bool
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
    public function update(User $user, department $department): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, department $department): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, department $department): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, department $department): bool
    {
        return false;
    }
}
