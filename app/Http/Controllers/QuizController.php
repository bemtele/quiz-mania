<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Choice;
use App\Question;

class QuizController extends Controller
{
    //
    public function create()
    { 
        $questions = Question::all();
    	$data = array('title'=>'Quiz Mainia | Home',
                        'questions'=> $questions
                        );
    	return view('quiz.create')->with($data);
    }

    public function index()
    {
        $questions = Question::all();
        $data = array('title' => 'Quize Mania | Show',
                      'questions' => $questions);
        return view('quiz.indexmain')->with($data);
    }

    public function showquestion(Request $request)
    {
        $number = $_GET['number'];
        $questions = Question::all();
        $question = Question::findOrFail($number);
        $choices = Choice::where('question_number',$number)->get();
        $data = array('title' => 'Quize Mania | Show',
                'question' => $question,
                'questions' => $questions,
                'choices' => $choices);
        return view('quiz.single')->with($data);
    }

    public function saveQuiz(Request $request)
    {   
        $title = $request->title;
        $description = $request->description;
        $correctAnswer = $request->correctAnswer;
        $question_number = $request->question_number;
        $choices = array();
        $choices[1] = $request->choice_1;
        $choices[2] = $request->choice_2;
        $choices[3] = $request->choice_3;
        $choices[4] = $request->choice_4;

        $question = new Question;
        $question->question = $title;
        $question->question_number = $question_number;
        $question->type = $request->question_type;
        $question->save();

        foreach ($choices as $ch => $value) {
            # code...
            $choice = new Choice;
            if($value != ''){
                if($correctAnswer == $ch){
                    $choice->is_correct = 1;
                }else{
                    $choice->is_correct = 0;
                }
                $choice->question_number = $question_number;
                $choice->description = $description;
                $choice->choice = $value;
                $choice->save();
            }
        }
    	return response(json_encode(['success'=>'Data recieved!']));
    }

    public function checkanswer(Request $request)
    {
        $questionNumber = $request->questionNumber;
        $userChoice = $request->userChoice;
        $next = $request->next;
        /*
        Get all the questions
        */
        $questions = Question::all();

        /*
        Get Correct choice
        */
        $choice = Choice::where('question_number','=',$questionNumber)->where('is_correct','=',1)->first();

        $correctAnswer = $choice->id;

        /*
        Check to see if next page
        */
        if(count($questions) == $next)
        {
            $next = 0;
        }else{
            $next++;
        }

        /*
        Check to see they match
        */
        if($correctAnswer == $userChoice){
            //TODO increase the score

            return response(json_encode(array('correct'=>$choice->description,'next'=>$next)));
        }

        return response(json_encode(array('incorrect'=>$choice->description,'next'=>$next)));
    }

    public function leaderboard(){
        $data = array(
            'title' => 'Board |Quize Maina'
        );
        return view('quiz.leader')->with($data);
    }
}
