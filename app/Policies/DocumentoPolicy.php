<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Documento;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the documento can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list documentos');
    }

    /**
     * Determine whether the documento can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Documento  $model
     * @return mixed
     */
    public function view(User $user, Documento $model)
    {
        return $user->hasPermissionTo('view documentos');
    }

    /**
     * Determine whether the documento can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create documentos');
    }

    /**
     * Determine whether the documento can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Documento  $model
     * @return mixed
     */
    public function update(User $user, Documento $model)
    {
        return $user->hasPermissionTo('update documentos');
    }

    /**
     * Determine whether the documento can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Documento  $model
     * @return mixed
     */
    public function delete(User $user, Documento $model)
    {
        return $user->hasPermissionTo('delete documentos');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Documento  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete documentos');
    }

    /**
     * Determine whether the documento can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Documento  $model
     * @return mixed
     */
    public function restore(User $user, Documento $model)
    {
        return false;
    }

    /**
     * Determine whether the documento can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Documento  $model
     * @return mixed
     */
    public function forceDelete(User $user, Documento $model)
    {
        return false;
    }
}
