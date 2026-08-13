<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Module;



class ModuleController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | ADMIN MODULE LIST
    |--------------------------------------------------------------------------
    */


    public function index()
    {

        $modules = Module::with('equipments')->get();


        return view(
            'admin.modules.index',
            compact('modules')
        );

    }






    /*
    |--------------------------------------------------------------------------
    | ADMIN VIEW EQUIPMENT
    |--------------------------------------------------------------------------
    */


    public function equipment($id)
    {

        $module = Module::with('equipments')
            ->findOrFail($id);


        $equipments = $module->equipments;


        return view(
            'admin.modules.equipment',
            compact(
                'module',
                'equipments'
            )
        );

    }






    /*
    |--------------------------------------------------------------------------
    | ADMIN CREATE MODULE
    |--------------------------------------------------------------------------
    */


    public function create()
    {

        return view(
            'admin.modules.create'
        );

    }







    /*
    |--------------------------------------------------------------------------
    | ADMIN STORE MODULE
    |--------------------------------------------------------------------------
    */


    public function store(Request $request)
    {


        $request->validate([

            'title'=>'required',
            'category'=>'required',
            'description'=>'required',
            'function'=>'required',

            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'video'=>'nullable|mimes:mp4,mov,avi|max:20000'

        ]);



        $imageName = null;



        if($request->hasFile('image'))
        {

            $imageName =
            time().'_'.$request
            ->file('image')
            ->getClientOriginalName();



            $request->file('image')->move(

                public_path('images/modules'),

                $imageName

            );

        }





        $videoName = null;



        if($request->hasFile('video'))
        {

            $videoName =
            time().'_'.$request
            ->file('video')
            ->getClientOriginalName();



            $request->file('video')->move(

                public_path('uploads/videos'),

                $videoName

            );

        }





        Module::create([

            'title'=>$request->title,

            'category'=>$request->category,

            'description'=>$request->description,

            'function'=>$request->function,

            'image'=>$imageName,

            'video'=>$videoName

        ]);



        return redirect('/admin/modules');

    }







    /*
    |--------------------------------------------------------------------------
    | ADMIN EDIT MODULE
    |--------------------------------------------------------------------------
    */


    public function edit($id)
    {

        $module = Module::findOrFail($id);



        return view(

            'admin.modules.edit',

            compact('module')

        );

    }







    /*
    |--------------------------------------------------------------------------
    | ADMIN UPDATE MODULE
    |--------------------------------------------------------------------------
    */


    public function update(Request $request,$id)
    {


        $module = Module::findOrFail($id);



        $request->validate([

            'title'=>'required',

            'category'=>'required',

            'description'=>'required',

            'function'=>'required'

        ]);



        $module->update([

            'title'=>$request->title,

            'category'=>$request->category,

            'description'=>$request->description,

            'function'=>$request->function

        ]);



        return redirect('/admin/modules')
            ->with(
                'success',
                'Module Updated Successfully'
            );

    }







    /*
    |--------------------------------------------------------------------------
    | ADMIN DELETE MODULE
    |--------------------------------------------------------------------------
    */


    public function destroy($id)
    {

        $module = Module::findOrFail($id);


        $module->delete();


        return redirect('/admin/modules');

    }









    /*
    |--------------------------------------------------------------------------
    | USER MODULE LIST PAGE
    |--------------------------------------------------------------------------
    |
    | URL:
    | /learning-module
    |
    */


public function userIndex()
{

    $module = Module::with('equipments')
        ->first();


    return view(
        'user.modules.intro',
        compact('module')
    );

}








    /*
    |--------------------------------------------------------------------------
    | USER INTRODUCTION PAGE
    |--------------------------------------------------------------------------
    |
    | URL:
    | /learning-module/{id}
    |
    */


    public function intro($id)
    {


        $module = Module::findOrFail($id);



        return view(

            'user.modules.intro',

            compact('module')

        );


    }








    /*
    |--------------------------------------------------------------------------
    | USER EQUIPMENT PAGE
    |--------------------------------------------------------------------------
    |
    | URL:
    | /learning-module/{id}/equipment
    |
    */


    public function userShow($id)
    {


        $module = Module::with('equipments')
            ->findOrFail($id);



        return view(

            'user.modules.show',

            compact('module')

        );


    }








    /*
    |--------------------------------------------------------------------------
    | USER VIDEO PAGE
    |--------------------------------------------------------------------------
    */


    public function video($id)
    {


        $module = Module::findOrFail($id);



        return view(

            'user.modules.video',

            compact('module')

        );


    }



}