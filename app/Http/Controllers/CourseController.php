<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\StoreRequest;
use App\Http\Requests\Course\UpdateRequest;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('courses.create', compact('teachers'));
    }

    public function store(StoreRequest $request)
    {
        $course = Course::create($request->validated());
        return redirect()->route('courses.index');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $teachers = Teacher::all();
        return view('courses.edit', compact('course', 'teachers'));
    }

    public function update(UpdateRequest $request, Course $course)
    {
        $course->update($request->validated());
        return redirect()->route('courses.show', $course)->with('success', 'Course updated successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }
}
