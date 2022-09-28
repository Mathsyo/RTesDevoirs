<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DoneHomework;
use Illuminate\Auth\Access\HandlesAuthorization;

class DoneHomeworkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the doneHomework can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list donehomeworks');
    }

    /**
     * Determine whether the doneHomework can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DoneHomework  $model
     * @return mixed
     */
    public function view(User $user, DoneHomework $model)
    {
        return $user->hasPermissionTo('view donehomeworks');
    }

    /**
     * Determine whether the doneHomework can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create donehomeworks');
    }

    /**
     * Determine whether the doneHomework can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DoneHomework  $model
     * @return mixed
     */
    public function update(User $user, DoneHomework $model)
    {
        return $user->hasPermissionTo('update donehomeworks');
    }

    /**
     * Determine whether the doneHomework can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DoneHomework  $model
     * @return mixed
     */
    public function delete(User $user, DoneHomework $model)
    {
        return $user->hasPermissionTo('delete donehomeworks');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DoneHomework  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete donehomeworks');
    }

    /**
     * Determine whether the doneHomework can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DoneHomework  $model
     * @return mixed
     */
    public function restore(User $user, DoneHomework $model)
    {
        return false;
    }

    /**
     * Determine whether the doneHomework can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DoneHomework  $model
     * @return mixed
     */
    public function forceDelete(User $user, DoneHomework $model)
    {
        return false;
    }
}
