<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;

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
}
