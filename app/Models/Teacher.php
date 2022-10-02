<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{

    protected $fillable = [
        'firstname', 
        'lastname', 
        'email'
    ];

    public $storeRules = [
        'firstname' => ['required','string','max:255'], 
        'lastname' => ['required','string','max:255'], 
        'email' => ['required','string','max:255'],
    ];

    public $updateRules = [
        'firstname' => ['sometimes','string','max:255'], 
        'lastname' => ['sometimes','string','max:255'], 
        'email' => ['sometimes','string','max:255'],
    ];

    protected $table = 'teachers';

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
