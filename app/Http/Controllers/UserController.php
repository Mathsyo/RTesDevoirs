<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('app.users.index')->with('users', $users);
    }

    public function create()
    {
        return view('app.users.create');
    }

    public function store(StoreRequest $request)
    {
        $user = User::create($request->validated());
        return redirect()->route('users.index');
    }

    public function show(Course $course)
    {
        return view('app.users.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('app.users.edit', compact('course'));
    }

    public function update(UpdateRequest $request, Course $course)
    {
        $course->update($request->validated());
        return redirect()->route('users.show', $course)->with('success', 'User updated successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
