<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'email', 'phone', 'password'];

    protected $searchableFields = ['*'];

    protected $hidden = ['password'];

    public function doneHomeworks()
    {
        return $this->hasMany(DoneHomework::class);
    }

    public function isSuperAdmin() {
        return $this->hasRole('admin');
    }

}
