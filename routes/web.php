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

Route::get('/', function() {
        $email = Mail::to('debarmat@etu.univ-grenoble-alpes.fr')->send(new WelcomeMail([
                'login' => 'debarmat',
                'password' => 'password',
        ]));
        dd($email);
});

Auth::routes([
        'register' => false,
        'reset' => false,
        'verify' => false,
]);

// Route::prefix('/')->middleware('auth')->group(function () {

//         Route::get('/', [HomeworkController::class, 'index']);
//         Route::get('/home', [HomeworkController::class, 'index'])->name('home');

//         Route::resource('homeworks', HomeworkController::class);
//         Route::resource('courses', CourseController::class);
//         Route::resource('teachers', TeacherController::class);

//         Route::resource('roles', RoleController::class);
//         Route::resource('permissions', PermissionController::class);

//         Route::prefix('settings')->name('settings.')->middleware('role:admin')->group(function () {
//                 Route::get('/', [PageController::class, 'settings'])->name('index');
//                 Route::post('/update', [PageController::class, 'updateSettings'])->name('update');
//         });

//         // Route::get('/test-email', function () {
//         //         return new WelcomeMail(auth()->user());
//         // });
// });
