<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['firstname', 'lastname', 'email'];

    protected $searchableFields = ['*'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
