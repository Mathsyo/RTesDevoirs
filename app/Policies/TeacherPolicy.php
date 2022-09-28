<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the teacher can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list teachers');
    }

    /**
     * Determine whether the teacher can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Teacher  $model
     * @return mixed
     */
    public function view(User $user, Teacher $model)
    {
        return $user->hasPermissionTo('view teachers');
    }

    /**
     * Determine whether the teacher can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create teachers');
    }

    /**
     * Determine whether the teacher can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Teacher  $model
     * @return mixed
     */
    public function update(User $user, Teacher $model)
    {
        return $user->hasPermissionTo('update teachers');
    }

    /**
     * Determine whether the teacher can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Teacher  $model
     * @return mixed
     */
    public function delete(User $user, Teacher $model)
    {
        return $user->hasPermissionTo('delete teachers');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Teacher  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete teachers');
    }

    /**
     * Determine whether the teacher can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Teacher  $model
     * @return mixed
     */
    public function restore(User $user, Teacher $model)
    {
        return false;
    }

    /**
     * Determine whether the teacher can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Teacher  $model
     * @return mixed
     */
    public function forceDelete(User $user, Teacher $model)
    {
        return false;
    }
}
