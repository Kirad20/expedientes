<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Expediente;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpedientePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the expediente can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list expedientes');
    }

    /**
     * Determine whether the expediente can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Expediente  $model
     * @return mixed
     */
    public function view(User $user, Expediente $model)
    {
        return $user->hasPermissionTo('view expedientes');
    }

    /**
     * Determine whether the expediente can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create expedientes');
    }

    /**
     * Determine whether the expediente can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Expediente  $model
     * @return mixed
     */
    public function update(User $user, Expediente $model)
    {
        return $user->hasPermissionTo('update expedientes');
    }

    /**
     * Determine whether the expediente can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Expediente  $model
     * @return mixed
     */
    public function delete(User $user, Expediente $model)
    {
        return $user->hasPermissionTo('delete expedientes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Expediente  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete expedientes');
    }

    /**
     * Determine whether the expediente can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Expediente  $model
     * @return mixed
     */
    public function restore(User $user, Expediente $model)
    {
        return false;
    }

    /**
     * Determine whether the expediente can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Expediente  $model
     * @return mixed
     */
    public function forceDelete(User $user, Expediente $model)
    {
        return false;
    }
}
