<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Quiz;
use App\Models\Module;
use App\Models\Question;
use App\Models\Course;
use App\Models\Progress;



class QuizController extends Controller
{


    // ==================================
    // USER VIEW AVAILABLE QUIZ
    // ==================================

    public function index()
    {


        $courses = Course::with('lessons')
                    ->get();



        return view(

            'user.quiz.index',

            compact('courses')

        );


    }





    // ==================================
    // USER ENROL COURSE
    // ==================================

    public function enrol($id)
    {


        $course = Course::with('lessons')
                    ->findOrFail($id);



        $exist = Progress::where(
                    'user_id',
                    auth()->id()
                )
                ->where(
                    'course_id',
                    $course->id
                )
                ->first();




        if(!$exist)
        {


            Progress::create([


                'user_id'=>auth()->id(),


                'course_id'=>$course->id,


                'lesson_id'=>$course->lessons->first()->id,


                'status'=>'enrolled',


                'video_completed'=>0,


                'quiz_completed'=>0,


                'score'=>0



            ]);


        }





        return redirect(

            route(
                'course.quiz',
                $course->id
            )

        );


    }

    // ==================================
    // AFTER ENROL COURSE PAGE
    // ==================================

    public function courseQuiz($id)
{

    $course = Course::with('quizzes.questions')
                    ->findOrFail($id);


    return view(
        'user.quiz.course',
        compact('course')
    );

}


    // ==================================
    // START QUIZ
    // ==================================

    public function show($id)
    {


        $quiz = Quiz::with('questions')

                    ->findOrFail($id);




        return view(

            'user.quiz.show',

            compact('quiz')

        );


    }









    // ==================================
    // SUBMIT QUIZ
    // ==================================

    public function submit(Request $request,$id)
    {


        $quiz = Quiz::with('questions')

                    ->findOrFail($id);



        $score = 0;



        foreach($quiz->questions as $question)
        {


            if(

                $request->answers[$question->id]

                ==

                $question->correct_answer

            )
            {


                $score++;


            }


        }





        Progress::where('user_id',auth()->id())

        ->where('course_id',$quiz->course_id)

        ->update([


            'quiz_completed'=>1,


            'score'=>$score



        ]);







        return view(

            'user.quiz.result',

            compact(
                'score',
                'quiz'
            )

        );



    }











    // ==================================
    // ADMIN QUIZ LIST
    // ==================================

    public function adminIndex()
    {


        $quizzes = Quiz::with('module')

                    ->get();



        return view(

            'admin.quiz.index',

            compact('quizzes')

        );


    }







    // ==================================
    // ADMIN CREATE QUIZ
    // ==================================

    public function create()
    {


        $modules = Module::all();



        return view(

            'admin.quiz.create',

            compact('modules')

        );


    }








    // ==================================
    // ADMIN STORE QUIZ
    // ==================================

    public function store(Request $request)
    {


        $request->validate([


            'module_id'=>'required',


            'title'=>'required'


        ]);




        Quiz::create([


            'module_id'=>$request->module_id,


            'title'=>$request->title,


            'description'=>$request->description



        ]);





        return redirect('/admin/quiz');


    }









    // ==================================
    // ADMIN SHOW QUIZ
    // ==================================

    public function adminShow($id)
    {


        $quiz = Quiz::with('questions')

                    ->findOrFail($id);



        return view(

            'admin.quiz.show',

            compact('quiz')

        );


    }









    // ==================================
    // ADMIN ADD QUESTION
    // ==================================

    public function addQuestion($id)
    {


        $quiz = Quiz::findOrFail($id);



        return view(

            'admin.quiz.question_create',

            compact('quiz')

        );


    }









    // ==================================
    // ADMIN STORE QUESTION
    // ==================================

    public function storeQuestion(Request $request,$id)
    {



        $request->validate([


            'question'=>'required',


            'option_a'=>'required',


            'option_b'=>'required',


            'option_c'=>'required',


            'option_d'=>'required',


            'correct_answer'=>'required'


        ]);





        Question::create([


            'quiz_id'=>$id,


            'question'=>$request->question,


            'option_a'=>$request->option_a,


            'option_b'=>$request->option_b,


            'option_c'=>$request->option_c,


            'option_d'=>$request->option_d,


            'correct_answer'=>$request->correct_answer



        ]);





        return redirect(

            '/admin/quiz/'.$id

        );



    }



}