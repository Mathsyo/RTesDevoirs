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

    protected $fillable = [
        'lastname',
        'firstname',
        'login', 
        'email', 
        'password'
    ];

    public $storeRules = [
        'lastname' => ['required','string','max:255'], 
        'firstname' => ['required','string','max:255'], 
        'login' => ['required','string','max:255'], 
        'email' => ['required','string','max:255'], 
        'password' => ['required','string','max:255'],
    ];

    public $updateRules = [
        'lastname' => ['sometimes','string','max:255'], 
        'firstname' => ['sometimes','string','max:255'], 
        'login' => ['sometimes','string','max:255'], 
        'email' => ['sometimes','string','max:255'], 
        'password' => ['sometimes','string','max:255'],
    ];

    protected $table = 'users';

    protected $hidden = ['password'];

    public function doneHomeworks()
    {
        return $this->hasMany(DoneHomework::class);
    }

    public function isAdmin() {
        return $this->hasRole('admin');
    }

}
