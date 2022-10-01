<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Teacher;
use Livewire\Component;

class ListTeacher extends Component
{

    public $search; 

    public $perPage = 10;

    public function render()
    {
        $teachers = Teacher
            ::where('firstname', 'LIKE', '%' . $this->search . '%')
            ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
            ->paginate($this->perPage);
        return view('livewire.teacher.list-teacher', compact('teachers'));
    }
}
