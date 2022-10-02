<?php

namespace App\Http\Controllers;

use App\Http\Requests\Homework\StoreRequest;
use App\Http\Requests\Homework\UpdateRequest;
use App\Models\Course;
use App\Models\Homework;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeworkController extends Controller
{

    public function index()
    {
        return view('homeworks.index');
    }

    public function create()
    {
        $courses = Course::all();
        return view('homeworks.create', compact('courses'));
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        // check if homework with same deadline and course exists
        $homeworkCheck = Homework::where('deadline', $validated['deadline'])
            ->where('course_id', $validated['course_id'])
            ->first();
        if (!isset($validated['force'])) {
            if ($homeworkCheck) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('confirm', 'Un devoir avec la même date existe déjà pour ce cours. Voulez-vous confirmer ?')
                    ->with('homeworkCheck', $homeworkCheck);
            }
        }


        $homework = new Homework;
        $homework->title = $validated['title'];
        $homework->description = $validated['description'];
        $homework->course_id = $validated['course_id'];
        $homework->deadline = $validated['deadline'];
        $homework->type = 1;
        $homework->slug = Str::slug($validated['title']);
        $homework->save();

        return redirect()->route('homeworks.index')->with('success', 'Le devoir a été créé avec succès.');
    }

    public function show(Homework $homework)
    {
        return view('homeworks.show', compact('homework'));
    }

    public function edit(Homework $homework)
    {
        $courses = Course::all();
        return view('homeworks.edit', compact('homework', 'courses'));
    }

    public function update(UpdateRequest $request, Homework $homework)
    {
        $homework->update($request->validated());
        return redirect()->route('homeworks.show', $homework)->with('success', 'Le devoir a été mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homework $homework)
    {
        $homework->delete();
        return redirect()->route('homeworks.index')->with('success', 'Le devoir a été supprimé avec succès.');
    }
    
}
