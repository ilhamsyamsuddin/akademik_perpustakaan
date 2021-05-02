<?php

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

Auth::routes([
	'register'=>false,
	'reset'=>false,
	'verify'=>false
]);
Route::get('/', function () {
    return view('admin.index');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'isAdmin'],function(){
    Route::resource('quiz', App\Http\Controllers\QuizController::class);
    Route::resource('question', App\Http\Controllers\QuestionController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::get('exam/assign', [App\Http\Controllers\ExamController::class, 'create'])->name('exam.create');
    Route::post('exam/assign', [App\Http\Controllers\ExamController::class, 'store'])->name('exam.store');
    Route::get('exam/index', [App\Http\Controllers\ExamController::class, 'index'])->name('exam.index');
    Route::post('exam/remove', [App\Http\Controllers\ExamController::class, 'destroy'])->name('exam.remove');
});


