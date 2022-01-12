<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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

//Route::get("students",[StudentsController::class,'getData']);
Route::get("savestudent",[StudentsController::class,'displayForm']);
Route::post("savestudent",[StudentsController::class,'addData'])->name('student.add');
//Route::get('user/create', [ HomeController::class, 'create' ]);
//Route::post('user/create', [ HomeController::class, 'store' ]);
//Route::view("addstudent","addstudent");
Route::get('students', [StudentsController::class, 'getData']);

Route::get('students/list', [StudentsController::class, 'getStudents'])->name('students.list');
