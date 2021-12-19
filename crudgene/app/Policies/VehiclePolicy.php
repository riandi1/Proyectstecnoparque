<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Auth\Access\HandlesAuthorization;

class VehiclePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the vehicle.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vehicle  $vehicle
     * @return mixed
     */
    public function view(User $user, Vehicle $vehicle)
    {
        // Update $user authorization to view $vehicle here.
        return true;
    }

    /**
     * Determine whether the user can create vehicle.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vehicle  $vehicle
     * @return mixed
     */
    public function create(User $user, Vehicle $vehicle)
    {
        // Update $user authorization to create $vehicle here.
        return true;
    }

    /**
     * Determine whether the user can update the vehicle.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vehicle  $vehicle
     * @return mixed
     */
    public function update(User $user, Vehicle $vehicle)
    {
        // Update $user authorization to update $vehicle here.
        return true;
    }

    /**
     * Determine whether the user can delete the vehicle.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vehicle  $vehicle
     * @return mixed
     */
    public function delete(User $user, Vehicle $vehicle)
    {
        // Update $user authorization to delete $vehicle here.
        return true;
    }
}
