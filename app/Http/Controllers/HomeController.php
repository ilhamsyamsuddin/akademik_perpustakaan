<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Result;
use App\Models\Quiz;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->is_admin==1){
            return redirect('/');
            //return view('home');
        }
        $authUser = auth()->user()->id;
        $assignedQuizId = [];
        $user = DB::table('quiz_user_table')->where('user_id',$authUser)->get();
        foreach ($user as $u) {
            array_push($assignedQuizId, $u->quiz_id);
        }
        $quizzes = Quiz::whereIn('id', $assignedQuizId)->get();

        $isExamAssigned = DB::table('quiz_user_table')->where('user_id',$authUser)->exists();
        $wasQuizAttempted = Result::where('user_id', $authUser)->whereIn('quiz_id',(new Quiz)->hasQuizAttempted())
                            ->pluck('quiz_id')->toArray();
        return view('home', compact('quizzes','isExamAssigned','wasQuizAttempted'));
        //return view('admin.index');
    }

    public function getLesson(){
        $authUser = auth()->user()->id;
        $assignedCategoryId = [];
        $user = DB::table('category_user_table')->where('user_id',$authUser)->get();
        foreach ($user as $u) {
            array_push($assignedCategoryId, $u->category_id);
        }
        $Lessons = Category::whereIn('id', $assignedCategoryId)->get();
        return view('Pelajaran.index', compact('Lessons'));
        //dd($Lessons);
    }
}
