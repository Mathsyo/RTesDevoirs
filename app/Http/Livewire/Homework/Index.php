<?php

namespace App\Http\Livewire\Homework;

use App\Models\Homework;
use Livewire\Component;

class Index extends Component
{


    public $homeworksViews = [
        '1' => [
            'name' => 'Liste',
            'icon' => 'bi bi-list-check',
            'component' => 'homework.list-homework',
        ],
        '2' => [
            'name' => 'Calendrier',
            'icon' => 'bi bi-calendar-check',
            'component' => 'homework.calendar-homework',
        ],
    ];

    public $homeworksView;

    public function setHomeworksView($type)
    {
        $this->homeworksView = $this->homeworksViews[$type];
    }

    public function mount()
    {
        $this->setHomeworksView(1);
    }

    public function render()
    {
        return view('livewire.homework.index');
    }
}
