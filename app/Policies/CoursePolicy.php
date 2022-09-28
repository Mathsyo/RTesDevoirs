<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the course can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list courses');
    }

    /**
     * Determine whether the course can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Course  $model
     * @return mixed
     */
    public function view(User $user, Course $model)
    {
        return $user->hasPermissionTo('view courses');
    }

    /**
     * Determine whether the course can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create courses');
    }

    /**
     * Determine whether the course can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Course  $model
     * @return mixed
     */
    public function update(User $user, Course $model)
    {
        return $user->hasPermissionTo('update courses');
    }

    /**
     * Determine whether the course can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Course  $model
     * @return mixed
     */
    public function delete(User $user, Course $model)
    {
        return $user->hasPermissionTo('delete courses');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Course  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete courses');
    }

    /**
     * Determine whether the course can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Course  $model
     * @return mixed
     */
    public function restore(User $user, Course $model)
    {
        return false;
    }

    /**
     * Determine whether the course can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Course  $model
     * @return mixed
     */
    public function forceDelete(User $user, Course $model)
    {
        return false;
    }
}
