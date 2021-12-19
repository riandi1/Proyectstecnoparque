<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Dueños;
use Illuminate\Auth\Access\HandlesAuthorization;

class DueñosPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the dueños.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dueños  $dueños
     * @return mixed
     */
    public function view(User $user, Dueños $dueños)
    {
        // Update $user authorization to view $dueños here.
        return true;
    }

    /**
     * Determine whether the user can create dueños.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dueños  $dueños
     * @return mixed
     */
    public function create(User $user, Dueños $dueños)
    {
        // Update $user authorization to create $dueños here.
        return true;
    }

    /**
     * Determine whether the user can update the dueños.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dueños  $dueños
     * @return mixed
     */
    public function update(User $user, Dueños $dueños)
    {
        // Update $user authorization to update $dueños here.
        return true;
    }

    /**
     * Determine whether the user can delete the dueños.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dueños  $dueños
     * @return mixed
     */
    public function delete(User $user, Dueños $dueños)
    {
        // Update $user authorization to delete $dueños here.
        return true;
    }
}
