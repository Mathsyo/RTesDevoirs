<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use Livewire\Component;

class ListCourse extends Component
{

    public $search;

    public $perPage = 10;

    public function delete($courseId)
    {
        if(auth()->user()->isAdmin()) {
            Course::find($courseId)->delete();
        }
    }

    public function render()
    {
        $courses = Course
            ::where('code', 'LIKE', '%' . $this->search . '%')
            ->orWhere('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('acronym', 'LIKE', '%' . $this->search . '%')
            ->paginate($this->perPage);
        return view('livewire.course.list-course', compact('courses'));
    }
}
