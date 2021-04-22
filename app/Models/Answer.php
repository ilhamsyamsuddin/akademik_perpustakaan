<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Answer;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id', 'answer', 'is_correct', 
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function storeAnswer($data,$question){
        foreach($data['options'] as $key=>$option){
            $is_correct =false;
    		if($key==$data['correct_answer']){
    			$is_correct=true;
    		}

    		$answer = Answer::create([
    			'question_id'=> $question,
    			'answer'=>$option,
    			'is_correct'=>$is_correct
    		]);
        }
    }

    public function updateAnswer($data,$question_id){
        $this->deleteAnswer($question_id);
        $this->storeAnswer($data,$question_id);
    }

    public function deleteAnswer($question_id){
        Answer::where('question_id', $question_id)->delete();
    }
}
