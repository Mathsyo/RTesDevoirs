<?php

namespace App\Http\Livewire\Homework;

use App\Models\Homework;
use Livewire\Component;

class ListHomework extends Component
{

    public $course;

    public $showBefore;

    public function toggleDone($homeworkId)
    {
        $homework = Homework::find($homeworkId);
        $homework->done ? $homework->undone() : $homework->done();
    }

    public function delete($homeworkId)
    {
        if(auth()->user()->isAdmin()) {
            Homework::find($homeworkId)->delete();
        }
    }

    public function render()
    {
        $this->showBefore = isset($_GET['showBefore']) && $_GET['showBefore'] === "1" ? true : false;
        if($this->course) {
            $homeworks = $this->course->homeworks->groupBy('deadline');
        } else {
            if($this->showBefore) {
                $homeworks = Homework
                    ::orderBy('deadline', 'asc')
                    ->get()
                    ->groupBy('deadline');
            } else {
                $homeworks = Homework
                    ::orderBy('deadline', 'asc')
                    ->where('deadline', '>', now()->subDays(2))
                    ->get()
                    ->groupBy('deadline');
            }
        }
        return view('livewire.homework.list-homework', compact('homeworks'));
    }
}
