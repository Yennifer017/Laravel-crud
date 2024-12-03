<?php

use App\Http\Controllers\AdministrativeViewController;
use App\Http\Controllers\StudentController;
use App\Models\Administrative_notes;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//students
Route::get('/students', [StudentController::class, 'showAll']);
Route::get('/add_student', function () {
    return view('add_student');
})->name('add_student');
Route::post('/modify_student', [StudentController::class, 'redirectModifyView'])->name('modify_student');
Route::post('/add_student_db', [StudentController::class, 'save'])->name('add_student_db');
Route::post('/delete_student_db', [StudentController::class, 'delete'])->name('delete_student_db');
Route::post('/modify_student_db', [StudentController::class, 'modify'])->name('modify_student_db');

//admnistrative notes
Route::post('/administrative_notes', 
    [AdministrativeViewController::class, 'redirectView'])->name('administrative_notes');

Route::post('/add_administrative_notes', 
    [AdministrativeViewController::class, 'addNote'])->name('add_administrative_notes');