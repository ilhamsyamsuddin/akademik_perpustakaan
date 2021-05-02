<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Result;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'minutes'
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function users(){
        return $this->belongsToMany(User::class,'quiz_user_table');
    }

    public function storeQuiz($data){
        return Quiz::create($data);
    }

    public function allQuiz(){
        return Quiz::all();
    }

    //same with editquiz
    public function findQuiz($id){
        return Quiz::find($id);
    }

    public function updateQuiz($data, $id){
        return Quiz::find($id)->update($data);
    }

    public function deleteQuiz($id){
        return Quiz::find($id)->delete();
    }

    public function getQuestions($id){
        return Quiz::with('questions')->where('id', $id)->get();
    }

    public function assignExam($data){
        $quizId = $data['quiz'];
        $quiz = Quiz::find($quizId);
        $userId = $data['user_id'];
        return $quiz->users()->syncWithoutDetaching($userId);
    }

    public function hasQuizAttempted(){
        $attempQuiz = [];
        $authUser = Auth()->user()->id;
        $user = Result::where('user_id', $authUser)->get();
        foreach ($user as $u) {
            array_push($attempQuiz, $u->quiz_id);
        }
        return $attempQuiz;
    }
}
