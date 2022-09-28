<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['color', 'name', 'acronym', 'code'];

    protected $searchableFields = ['*'];

    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
