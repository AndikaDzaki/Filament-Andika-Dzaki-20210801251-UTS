<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VehicleSale;
use Illuminate\Auth\Access\HandlesAuthorization;

class VehicleSalePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_vehicle::sale');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, VehicleSale $vehicleSale): bool
    {
        return $user->can('view_vehicle::sale');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_vehicle::sale');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, VehicleSale $vehicleSale): bool
    {
        return $user->can('update_vehicle::sale');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, VehicleSale $vehicleSale): bool
    {
        return $user->can('delete_vehicle::sale');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_vehicle::sale');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, VehicleSale $vehicleSale): bool
    {
        return $user->can('force_delete_vehicle::sale');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_vehicle::sale');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, VehicleSale $vehicleSale): bool
    {
        return $user->can('restore_vehicle::sale');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_vehicle::sale');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, VehicleSale $vehicleSale): bool
    {
        return $user->can('replicate_vehicle::sale');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_vehicle::sale');
    }
}
