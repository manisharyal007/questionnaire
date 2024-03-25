<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\QuestionnaireController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('subjects', SubjectController::class)->middleware('auth');
Route::resource('questionnaires', QuestionnaireController::class);
Route::get('active_questionnaire', [QuestionnaireController::class, 'activeQuestionnaire']);
Route::get('student_login', [StudentController::class, 'studentLogin']);
Route::post('find_email', [StudentController::class, 'findEmail'])->name('findEmail');
Route::get('student_questionnaire/{student_id}',  [StudentController::class, 'studentQuestionnaire'] )->name('student.questionnaires');
Route::get('myexam/{student_id}/exam/{token_link}', [StudentController::class, 'myExam']);
Route::post('answerSubmit', [StudentController::class, 'answerSubmit'])->name('answer.submit');
//Route::get('sendhtmlemail', [QuestionnaireController::class, 'sendEmail']);
