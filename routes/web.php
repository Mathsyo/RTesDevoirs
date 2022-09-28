<?php

use App\Http\Controllers\HomeworkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::prefix('/')->middleware('auth')->group(function () {

        Route::get('/', [HomeworkController::class, 'index']);
        Route::get('/home', [HomeworkController::class, 'index'])->name('home');

        Route::resource('homeworks', HomeworkController::class);

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
});
