<?php

namespace App\Http\Livewire\Homework;

use App\Models\Homework;
use Livewire\Component;

class ListHomework extends Component
{

    public $course;

    public function toggleDone($homeworkId)
    {
        $homework = Homework::find($homeworkId);
        $homework->done ? $homework->undone() : $homework->done();
    }

    public function render()
    {
        if($this->course) {
            $homeworks = $this->course->homeworks->groupBy('deadline');;
        } else {
            $homeworks = Homework
            ::orderBy('deadline', 'asc')
            ->get()
            ->groupBy('deadline');
        }
        return view('livewire.homework.list-homework', compact('homeworks'));
    }
}
