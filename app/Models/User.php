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

    public static $storeRules = [
        'lastname' => ['required','string','max:255'], 
        'firstname' => ['required','string','max:255'], 
        'login' => ['required','string','max:255'], 
        'email' => ['required','string','max:255'], 
        'password' => ['required','string','max:255'],
    ];

    public static $updateRules = [
        'lastname' => ['sometimes','string','max:255'], 
        'firstname' => ['sometimes','string','max:255'], 
        'login' => ['sometimes','string','max:255'], 
        'email' => ['sometimes','string','max:255'], 
        'password' => ['sometimes','string','max:255'],
    ];

    protected $table = 'users';

    protected $hidden = ['password'];

    public static function generatePassword($length = 5)
    {
        $words = json_decode(file_get_contents('https://random-word-api.herokuapp.com/word?number=' . $length));
        $password = '';
        foreach ($words as $word) {
            $password .= $word . '-';
        }
        $password .= rand(100, 999);
        return $password;
    }

    public function doneHomeworks()
    {
        return $this->hasMany(DoneHomework::class);
    }

    public function isAdmin() {
        return $this->hasRole('admin');
    }

}
