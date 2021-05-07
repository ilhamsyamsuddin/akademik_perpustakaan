<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    public function create(){
        return view('backend.exam.assign');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $quiz = (new Quiz)->assignExam($request->all());
        return redirect()->back()->with('message', 'kuis Berhasil dipilihkan');
    }

    public function index(Request $request){
        $quizzes = Quiz::get();
        return view('backend.exam.index', compact('quizzes'));
    }

    public function destroy(Request $request){
        $user_id = $request->get('user_id');
        $quiz_id = $request->get('quiz_id');
        $quiz = Quiz::find($quiz_id);
        $result = Result::where('quiz_id',$quiz_id)->where('user_id',$user_id)->exists();
        if($result){
            return redirect()->back()->with('message', 'User sudah mengerjakan kuis, tidak bisa dihapus');
        }
        else{
            $quiz->users()->detach($user_id);
            return redirect()->back()->with('message', 'pemasangan Kuis berhasil dihapus');
        }

    }

    public function getQuizQuestions(Request $request,$quizId){
        $authUser=auth()->user()->id;

        //check if user has been assigned a particular quiz
        $userId = DB::table('quiz_user_table')->where('user_id',$authUser)->pluck('quiz_id')->toArray();
        if(!in_array($quizId, $userId)){
            return redirect()->to('/home')->with('error','Kuis ini bukan untuk User ini');
        }

        $quiz = Quiz::find($quizId);
        $time = Quiz::where('id',$quizId)->value('minutes');
        $quizQuestions = Question::where('quiz_id',$quizId)->with('answers')->get();
        $authUserHasPlayedQuiz = Result::where(['user_id'=>$authUser,'quiz_id'=>$quizId])->get();

        //has user played particular quiz
        $wasCompleted = Result::where('user_id',$authUser)->whereIn('quiz_id',(new Quiz)->hasQuizAttempted())->pluck('quiz_id')->toArray();

        if(in_array($quizId,$wasCompleted)){
            return redirect()->to('/home')->with('error','User sudah menyelesaikan kuis');
        }

        return view('quiz',compact('quiz','time','quizQuestions','authUserHasPlayedQuiz'));

    }

    public function postQuiz(Request $request){
        $questionId= $request['questionId'];
        $answerId = $request['answerId'];
        $quizId = $request['quizId'];


        $authUser = auth()->user();

        return $userQuestionAnswer = Result::updateOrCreate(
            ['user_id'=> $authUser->id, 'quiz_id'=>$quizId, 'question_id'=>$questionId],
            ['answer_id'=>$answerId]

        );
    }

    public function viewResult($userId,$quizId){
        $results = Result::where('user_id',$userId)->where('quiz_id',$quizId)->get();
        return view('result-detail',compact('results'));
    }
}
