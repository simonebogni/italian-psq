<?php

use App\Models\Survey;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show')->middleware('auth');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users')->middleware('auth');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update')->middleware('auth');

Route::get('/surveys', [App\Http\Controllers\SurveyController::class, 'index'])->name('surveys')->middleware('auth');
Route::post('/surveys', [App\Http\Controllers\SurveyController::class, 'store'])->name('surveys.store')->middleware('auth');
Route::get('/surveys/create', [App\Http\Controllers\SurveyController::class, 'create'])->name('surveys.create')->middleware('auth');
Route::get('/surveys/{survey}', [App\Http\Controllers\SurveyController::class, 'show'])->name('surveys.show')->middleware('auth');
Route::get('/surveys/{survey}/setChecked', [App\Http\Controllers\SurveyController::class, 'setChecked'])->name('surveys.setChecked')->middleware('auth');
Route::delete('/surveys/{survey}', [App\Http\Controllers\SurveyController::class, 'destroy'])->name('surveys.destroy')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

require __DIR__.'/auth.php';

Auth::routes();


