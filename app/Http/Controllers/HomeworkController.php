<?php

namespace App\Http\Controllers;

use App\Http\Requests\Homework\StoreRequest;
use App\Models\Course;
use App\Models\Homework;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homeworks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('homeworks.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
