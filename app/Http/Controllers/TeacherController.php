<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teacher\StoreRequest;
use App\Http\Requests\Teacher\UpdateRequest;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function index()
    {
        return view('teachers.index');
    }

    public function create()
    {
        $courses = Course::all();
        return view('teachers.create', compact('courses'));
    }

    public function store(StoreRequest $request)
    {
        $teacher = Teacher::create($request->validated());
        return redirect()->route('teachers.index');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(UpdateRequest $request, Teacher $teacher)
    {
        $teacher->update($request->validated());
        return redirect()->route('teachers.show', $teacher)->with('success', 'Teacher updated successfully');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully');
    }
}
