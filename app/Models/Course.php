<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{

    protected $fillable = [
        'color', 
        'name', 
        'acronym', 
        'code', 
        'teacher_id'
    ];

    public static $storeRules = [
        'color' => ['required','string','max:255'], 
        'name' => ['required','string','max:255'], 
        'acronym' => ['required','string','max:255'], 
        'code' => ['required','string','max:255'], 
        'teacher_id' => ['required','integer','exists:teachers,id'],
    ];

    public static $updateRules = [
        'color' => ['sometimes','string','max:255'], 
        'name' => ['sometimes','string','max:255'], 
        'acronym' => ['sometimes','string','max:255'], 
        'code' => ['sometimes','string','max:255'], 
        'teacher_id' => ['sometimes','integer','exists:teachers,id'],
    ];

    protected $table = 'courses';

    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
