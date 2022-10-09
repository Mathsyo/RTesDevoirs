<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Homework extends Model
{

    protected $fillable = [
        'title',
        'description',
        'slug',
        'deadline',
        'type',
        'course_id',
    ];

    public static $storeRules = [
        'title' => ['required','string','max:255'],
        'description' => ['required','string','max:255'],
        'deadline' => ['required','date'],
        'course_id' => ['required','integer','exists:courses,id'],
    ];

    public static $updateRules = [
        'title' => ['sometimes','string','max:255'],
        'description' => ['sometimes','string','max:255'],
        'slug' => ['sometimes','string','max:255'],
        'deadline' => ['sometimes','date'],
        'type' => ['sometimes','integer'],
        'course_id' => ['sometimes','integer','exists:courses,id'],
    ];

    protected $table = 'homeworks';

    protected $casts = [
        'deadline' => 'date',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getDoneAttribute()
    {
        return DoneHomework::where('user_id', auth()->id())->where('homework_id', $this->id)->exists();
    }

    public function done()
    {
        DoneHomework::create([
            'user_id' => auth()->id(),
            'homework_id' => $this->id,
        ]);
    }

    public function undone()
    {
        DoneHomework::where('user_id', auth()->id())->where('homework_id', $this->id)->delete();
    }
}
