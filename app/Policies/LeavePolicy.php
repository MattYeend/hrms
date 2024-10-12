<?php

namespace App\Policies;

use App\Models\Leave;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LeavePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->isSuperAdmin() || $user->isAdmin() || $user->cSuite()){
            return true;
        }
        if($user->department && $user->department->dept_lead_id === $user->id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Leave $leave): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // All users can create leave
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Leave $leave): bool
    {
        // Only the user who created the leave, or an admin/super admin can update it
        return $user->id === $leave->created_by || $user->isAdmin() || $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Leave $leave): bool
    {
        // Only the user who created the leave, or an admin/super admin can delete it
        return $user->id === $leave->created_by || $user->isAdmin() || $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Leave $leave): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Leave $leave): bool
    {
        //
    }

    public function approve(User $user, Leave $leave)
    {
        $allowed = $user->isSuperAdmin() || $user->isAdmin() || $user->cSuite() || $user->id === $leave->createdBy->department->dept_lead_id;
        return $allowed;
    }

    public function deny(User $user, Leave $leave)
    {
        $allowed = $user->isSuperAdmin() || $user->isAdmin() || $user->cSuite() || $user->id === $leave->createdBy->department->dept_lead_id;
        return $allowed;
    }
}
