<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoneHomework extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id', 'homework_id'];

    protected $searchableFields = ['*'];

    protected $table = 'done_homeworks';

    public function homework()
    {
        return $this->belongsTo(Homework::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
