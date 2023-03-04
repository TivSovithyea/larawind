<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ScheduleController;
use App\Http\Livewire\ClassRoom;
use App\Http\Livewire\Subject\Index as Subject;
use App\Http\Livewire\StudyTime\Index as StudyTime;
use App\Http\Livewire\StudyYear\Index as StudyYear;
use App\Http\Livewire\Teacher\Index as Teacher;
use App\Http\Livewire\StudyClass\Index as StudyClass;
use App\Http\Livewire\Teaching\Index as Teaching;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->name('dashboard');

Route::resource('categories', CategoryController::class);
Route::get('/class-rooms', ClassRoom::class)->name('class-rooms');
Route::get('/subjects', Subject::class)->name('subjects');
Route::get('/study-times', StudyTime::class)->name('study-times');
Route::get('/study-years', StudyYear::class)->name('study-years');
Route::get('/teachers', Teacher::class)->name('teachers');
Route::get('/study-classes', StudyClass::class)->name('study-classes');
Route::get('/teachings', Teaching::class)->name('teachings');
Route::get('/schedules', [ScheduleController::class, 'index']);