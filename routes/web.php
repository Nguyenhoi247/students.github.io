<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

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

Route::get('/list', [StudentController::class, 'index']);

Route::get('/create_form', [StudentController::class, 'insertform']);
Route::post('/create', [StudentController::class, 'insert']);



Route::get('/subjectlist', [SubjectController::class, 'test']);

Route::get('/subjectform', [SubjectController::class, 'subjectform']);
Route::post('/subject', [SubjectController::class, 'subject']);

// subject_studdent_list
Route::get('/subjectstlist/{id}', [SubjectController::class, 'test1']);
Route::post('/subjectst', [SubjectController::class, 'subjectst']);





Route::get('/scorelist', [ScoreController::class, 'index1']);

Route::get('/scoreform', [ScoreController::class, 'scoreform']);
Route::post('/score', [ScoreController::class, 'score']);
// Route::post('/insertform', function () {
//     return view('create');
//     // return view('test' ,['name'=>'Test số 1']);
// });
// Route::get('/update_form/{id}', [StudentController::class, 'updateform']);
Route::get('/update/{id}', [StudentController::class, 'updateform']);
Route::post('/update/{id}', [StudentController::class, 'edit']);
// Route::get('insert', [StudentController::class, 'insertform']);


Route::post('/delete/{id}',[StudentController::class, 'destroy']);

// Route::get('view-records', 'StudViewController@index');
// Route::post('create', 'StudentController@insert');