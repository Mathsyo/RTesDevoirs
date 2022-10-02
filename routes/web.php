<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeworkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TeacherController;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes([
        'register' => false,
        'reset' => false,
        'verify' => false,
]);


Route::prefix('/')->middleware('auth')->group(function () {

        // ==================================
        // Welcome page
        // ==================================
        Route::get('/', [HomeworkController::class, 'index']);
        Route::get('/home', [HomeworkController::class, 'index'])->name('home');

        // ==================================
        // Homeworks
        // ==================================
        Route::prefix('homeworks')->name('homeworks.')->group( function() {
                Route::get('/create', [HomeworkController::class, 'create'])->name('create');
                Route::post('/store', [HomeworkController::class, 'store'])->name('store');
        });
        Route::prefix('homeworks')->name('homeworks')->middleware('role:admin')->group(function() {
                Route::delete('/{homework}', [HomeworkController::class, 'destroy'])->name('.destroy');
        });

        // ==================================
        // Courses
        // ==================================
        Route::prefix('courses')->name('courses.')->group( function() {
                Route::get('/', [CourseController::class, 'index'])->name('index');
                Route::get('/{course}', [CourseController::class, 'show'])->name('show');
        });
        Route::prefix('courses')->name('courses')->middleware('role:admin')->group(function() {
                Route::get('/create', [CourseController::class, 'create'])->name('.create');
                Route::post('/store', [CourseController::class, 'store'])->name('.store');

                Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('.edit');
                Route::put('/{course}', [CourseController::class, 'update'])->name('.update');

                Route::delete('/{course}', [CourseController::class, 'destroy'])->name('.destroy');
        });

        // ==================================
        // Teachers
        // ==================================
        Route::prefix('teachers')->name('teachers.')->group( function() {
                Route::get('/', [TeacherController::class, 'index'])->name('index');
                Route::get('/{teacher}', [TeacherController::class, 'show'])->name('show');
        });
        Route::prefix('teachers')->name('teachers')->middleware('role:admin')->group(function() {
                Route::get('/create', [TeacherController::class, 'create'])->name('.create');
                Route::post('/store', [TeacherController::class, 'store'])->name('.store');

                Route::get('/{teacher}/edit', [TeacherController::class, 'edit'])->name('.edit');
                Route::put('/{teacher}', [TeacherController::class, 'update'])->name('.update');

                Route::delete('/{teacher}', [TeacherController::class, 'destroy'])->name('.destroy');
        });

        // ==================================
        // Users
        // ==================================
        Route::prefix('users')->name('users')->middleware('role:admin')->group(function() {
                Route::get('/', [PageController::class, 'users'])->name('index');
                Route::get('/{user}', [PageController::class, 'user'])->name('show');

                Route::get('/create', [PageController::class, 'createUser'])->name('.create');
                Route::post('/store', [PageController::class, 'storeUser'])->name('.store');

                Route::get('/{user}/edit', [PageController::class, 'editUser'])->name('.edit');
                Route::put('/{user}', [PageController::class, 'updateUser'])->name('.update');

                Route::delete('/{user}', [PageController::class, 'destroyUser'])->name('.destroy');
        });

        // ==================================
        // Settings
        // ==================================
        Route::prefix('settings')->name('settings.')->middleware('role:admin')->group(function () {
                Route::get('/', [PageController::class, 'settings'])->name('index');
                Route::post('/update', [PageController::class, 'updateSettings'])->name('update');
        });
});
