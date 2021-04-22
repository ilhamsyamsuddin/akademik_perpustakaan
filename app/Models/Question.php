<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Question;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question', 'quiz_id'
    ];

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function storeQuestion($data){
    	$data['quiz_id'] = $data['quiz'];
    	return Question::create($data);
    }

    public function getQuestion(){
        return Question::orderBy('created_at', 'DESC')->with('quiz')->paginate(10);
    }

    public function getQuestionByID($id){
        return Question::find($id);
    }

    public function updateQuestion($data, $id){
        $question = Question::find($id);
        $question->question = $data['question'];
        $question->quiz_id = $data['quiz'];
        $question->save();
        return $question;
    }

    public function deleteQuestion($id){
        Question::where('id', $id)->delete();
    }

}
