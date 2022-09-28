<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Homework;
use Illuminate\Auth\Access\HandlesAuthorization;

class HomeworkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the homework can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list homeworks');
    }

    /**
     * Determine whether the homework can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Homework  $model
     * @return mixed
     */
    public function view(User $user, Homework $model)
    {
        return $user->hasPermissionTo('view homeworks');
    }

    /**
     * Determine whether the homework can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create homeworks');
    }

    /**
     * Determine whether the homework can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Homework  $model
     * @return mixed
     */
    public function update(User $user, Homework $model)
    {
        return $user->hasPermissionTo('update homeworks');
    }

    /**
     * Determine whether the homework can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Homework  $model
     * @return mixed
     */
    public function delete(User $user, Homework $model)
    {
        return $user->hasPermissionTo('delete homeworks');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Homework  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete homeworks');
    }

    /**
     * Determine whether the homework can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Homework  $model
     * @return mixed
     */
    public function restore(User $user, Homework $model)
    {
        return false;
    }

    /**
     * Determine whether the homework can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Homework  $model
     * @return mixed
     */
    public function forceDelete(User $user, Homework $model)
    {
        return false;
    }
}
