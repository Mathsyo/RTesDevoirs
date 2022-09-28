<?php

namespace App\Http\Livewire\Homework;

use App\Models\Homework;
use Livewire\Component;

class ListHomework extends Component
{

    public function render()
    {
        $homeworks = Homework::all()->groupBy(function ($homework) {
            return $homework->deadline->format('Y-m-d');
        });
        dd($homeworks);
        return view('livewire.homework.list-homework', compact('homeworks'));
    }
}
