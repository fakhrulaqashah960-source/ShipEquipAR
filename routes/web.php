<?php


use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ShipModelController;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;

use App\Http\Controllers\QuizController;

use App\Http\Controllers\AdminQuizController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminNoteController;

use App\Http\Controllers\NoteController;


/*
|--------------------------------------------------------------------------
| PUBLIC LANDING PAGE
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return view('welcome');

});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| PROTECTED AR MODEL
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'prevent.back'
])
->get('/ar-model/{file}', function ($file) {


    $path = public_path(
        'uploads/reality/'.$file
    );


    if(!file_exists($path))
    {

        abort(404);

    }


    return response()->file($path);


})
->name('ar.model');



/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/


Route::middleware([
    'auth',
    'user',
    'prevent.back'
])
->group(function () {



    /*
    |--------------------------------------------------------------------------
    | USER DASHBOARD
    |--------------------------------------------------------------------------
    */


    Route::get('/dashboard', function () {


        // Extra security check

        if(!auth()->check())
        {

            return redirect()
                ->route('login');

        }

        $modules = \App\Models\Module::
                    with('equipments')
                    ->get();



        return view(
            'user.dashboard',
            compact('modules')
        );


    })
    ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | LEARNING MODULE
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/learning-module/{id}/equipment',
        [ModuleController::class,'userShow']
    )
    ->name('learning.show');

    /*
    |--------------------------------------------------------------------------
    | EQUIPMENT
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/equipment/{id}',
        [EquipmentController::class,'userShow']
    )
    ->name('equipment.show');

    /*
    |--------------------------------------------------------------------------
    | SHIP MODEL
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/ship-model',
        [ShipModelController::class,'userIndex']
    )
    ->name('ship.model');


    /*
    |--------------------------------------------------------------------------
    | NOTES
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/module-notes',
        [NoteController::class,'index']
    )
    ->name('user.notes');



    Route::get(
        '/module-notes/{id}',
        [NoteController::class,'show']
    )
    ->name('user.notes.show');

    /*
    |--------------------------------------------------------------------------
    | COURSE
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/course/{id}',
        [CourseController::class,'userShow']
    )
    ->name('course.show');

    /*
    |--------------------------------------------------------------------------
    | LESSON
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/lesson/{id}',
        [LessonController::class,'userShow']
    )
    ->name('lesson.show');

    /*
    |--------------------------------------------------------------------------
    | QUIZ
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/quiz',
        [QuizController::class,'index']
    )
    ->name('quiz.index');



    Route::get(
        '/course/enrol/{id}',
        [QuizController::class,'enrol']
    )
    ->name('course.enrol');



    Route::get(
        '/course/{id}/quiz',
        [QuizController::class,'courseQuiz']
    )
    ->name('course.quiz');



    Route::get(
        '/quiz/start/{id}',
        [QuizController::class,'show']
    )
    ->name('quiz.show');



    Route::post(
        '/quiz/{id}/submit',
        [QuizController::class,'submit']
    )
    ->name('quiz.submit');



});


/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/


Route::middleware([
    'auth',
    'admin',
    'prevent.back'
])
->prefix('admin')
->group(function () {

    Route::get('/', function(){


        return view(
            'admin.dashboard'
        );


    })
    ->name('admin.dashboard');

    Route::resource(
        'users',
        AdminUserController::class
    )
    ->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ])
    ->names('admin.users');

    Route::resource(
        'modules',
        ModuleController::class
    );

    Route::get(
        'modules/{id}/equipment',
        [ModuleController::class,'equipment']
    )
    ->name('admin.module.equipment');

    Route::resource(
        'equipment',
        EquipmentController::class
    )
    ->names('admin.equipment');

    Route::resource(
        'notes',
        AdminNoteController::class
    )
    ->names('admin.notes');

    Route::resource(
        'ship-model',
        ShipModelController::class
    )
    ->names('ship-model');

    Route::resource(
        'quiz',
        AdminQuizController::class
    );

    Route::get(
        'quiz/{quiz}/question/create',
        [AdminQuizController::class,'addQuestion']
    )
    ->whereNumber('quiz');

    Route::post(
        'quiz/{quiz}/question/store',
        [AdminQuizController::class,'storeQuestion']
    )
    ->whereNumber('quiz');

    Route::resource(
        'course',
        CourseController::class
    );




    Route::resource(
        'lesson',
        LessonController::class
    );



});



/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/


Route::middleware([
    'auth',
    'prevent.back'
])
->group(function () {


    Route::get(
        '/profile',
        [ProfileController::class,'edit']
    )
    ->name('profile.edit');



    Route::patch(
        '/profile',
        [ProfileController::class,'update']
    )
    ->name('profile.update');



    Route::delete(
        '/profile',
        [ProfileController::class,'destroy']
    )
    ->name('profile.destroy');


});