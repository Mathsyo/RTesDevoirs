<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Homework extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'deadline',
        'type',
        'course_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'homeworks';

    protected $casts = [
        'deadline' => 'date',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function isDone() 
    {
        return DoneHomework::where('user_id', auth()->id())->where('homework_id', $this->id)->exists();
    }
}
