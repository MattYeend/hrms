<?php

namespace App\Policies;

use App\Models\Blogs;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BlogsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Blogs $blogs): bool
    {
        return $blogs->status === 'published' && $blogs->approval_status === 'approved';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Blogs $blogs): bool
    {
        return $user->id === $blogs->created_by;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Blogs $blogs): bool
    {
        return $user->role->name === 'Admin' || $user->role->name === 'Super Admin';
    }

    /**
     * Determine whether the user can approve/deny the blog.
     */
    public function approve(User $user): bool
    {
        return $user->role->name === 'Admin' || $user->role->name === 'Super Admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Blogs $blogs): bool
    {
        return $user->role->name === 'Admin' || $user->role->name === 'Super Admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Blogs $blogs): bool
    {
        $user->role->name === 'Super Admin';
    }
}
