<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [MainPageController::class, 'index']);
Route::middleware('show')->group(function(){
    Route::resource('tasks', TaskController::class)->except('show', 'create');
    Route::delete('/tasks', [TaskController::class, 'deleteAll'])->name('tasks.delete-all');
});
Route::get('/users/register', [UsersController::class, 'register'])->name('users.register');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::delete('/logout', [SessionsController::class, 'destroy'])->name('sessions.delete');
Route::get('/login', [SessionsController::class, 'create'])->name('sessions.login');
Route::post('/create', [SessionsController::class, 'store'])->name('sessions.store');
