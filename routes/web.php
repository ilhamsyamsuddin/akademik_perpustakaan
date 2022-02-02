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
    //return view('admin.index');
    return redirect('/login');
});
Route::get('/yes', function () {
    return "yeas";
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('user/quiz/{quizId}', [App\Http\Controllers\ExamController::class, 'getQuizQuestions'])->middleware('auth');
Route::post('quiz/create', [App\Http\Controllers\ExamController::class, 'postQuiz']);
Route::get('/result/user/{userId}/quiz/{quizId}',[App\Http\Controllers\ExamController::class, 'viewResult'])->middleware('auth');
Route::get('/Materi/{userId}', [App\Http\Controllers\HomeController::class, 'getLesson'])->name('Materi');
Route::get('/Materi/{userId}/{categoryId}', [App\Http\Controllers\HomeController::class, 'showLesson'])->name('Materi.show');
Route::get('/Materi/{userId}/{categoryId}/{materialId}', [App\Http\Controllers\HomeController::class, 'showMaterial'])->name('Materi.material');

Route::group(['middleware'=>'isAdmin'],function(){
    Route::resource('quiz', App\Http\Controllers\QuizController::class);
    Route::resource('question', App\Http\Controllers\QuestionController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::get('exam/assign', [App\Http\Controllers\ExamController::class, 'create'])->name('exam.create');
    Route::post('exam/assign', [App\Http\Controllers\ExamController::class, 'store'])->name('exam.store');
    Route::get('exam/index', [App\Http\Controllers\ExamController::class, 'index'])->name('exam.index');
    Route::post('exam/remove', [App\Http\Controllers\ExamController::class, 'destroy'])->name('exam.remove');
    Route::get('/result',[App\Http\Controllers\ExamController::class, 'result'])->name('result');
    Route::get('/result/{userId}/{quizId}',[App\Http\Controllers\ExamController::class, 'userQuizResult']);
    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::resource('material', App\Http\Controllers\MaterialController::class);

    Route::get('lesson/assign', [App\Http\Controllers\LessonController::class, 'create'])->name('lesson.create');
    Route::post('lesson/assign', [App\Http\Controllers\LessonController::class, 'store'])->name('lesson.store');
    Route::get('lesson/index', [App\Http\Controllers\LessonController::class, 'index'])->name('lesson.index');
    Route::post('lesson/remove', [App\Http\Controllers\lessonController::class, 'destroy'])->name('lesson.remove');
});


