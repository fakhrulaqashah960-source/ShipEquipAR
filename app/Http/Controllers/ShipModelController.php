<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipModel;

class ShipModelController extends Controller
{


    // ==========================
    // ADMIN SHIP MODEL LIST
    // ==========================

    public function index()
    {

        $ships = ShipModel::all();


        return view(
            'admin.ship-model.index',
            compact('ships')
        );

    }




    // ==========================
    // CREATE PAGE
    // ==========================

    public function create()
    {

        return view(
            'admin.ship-model.create'
        );

    }





    // ==========================
    // STORE SHIP MODEL
    // ==========================

    public function store(Request $request)
    {


        $request->validate([

            'name'=>'required',

            'marker_image'=>'required|image',

            'model_file'=>'required',

        ]);


        // Upload Ship Image

        $imageName = time().'_'.$request
            ->file('marker_image')
            ->getClientOriginalName();



        $request->file('marker_image')
            ->move(
                public_path('uploads/markers'),
                $imageName
            );







        // Upload Reality File

        $realityName = time().'_'.$request
            ->file('model_file')
            ->getClientOriginalName();



        $request->file('model_file')
            ->move(
                public_path('uploads/reality'),
                $realityName
            );







        // Save database

        ShipModel::create([


            'name'=>$request->name,


            'marker_image'=>$imageName,


            'model_file'=>$realityName,


            'description'=>$request->description


        ]);



        return redirect('/admin/ship-model');


    }







    // ==========================
    // EDIT PAGE
    // ==========================

    public function edit($id)
    {


        $ship = ShipModel::findOrFail($id);



        return view(

            'admin.ship-model.edit',

            compact('ship')

        );


    }








    // ==========================
    // UPDATE
    // ==========================

    public function update(Request $request,$id)
    {


        $ship = ShipModel::findOrFail($id);



        $data=[


            'name'=>$request->name,


            'description'=>$request->description


        ];


            return redirect('/admin/ship-model');




        // Update image

        if($request->hasFile('marker_image'))
        {


            $imageName=time().'_'.$request
                ->file('marker_image')
                ->getClientOriginalName();



            $request->file('marker_image')
                ->move(
                    public_path('uploads/markers'),
                    $imageName
                );



            $data['marker_image']=$imageName;


        }








        // Update reality file

        if($request->hasFile('model_file'))
        {


            $realityName=time().'_'.$request
                ->file('model_file')
                ->getClientOriginalName();



            $request->file('model_file')
                ->move(
                    public_path('uploads/reality'),
                    $realityName
                );



            $data['model_file']=$realityName;


        }







        $ship->update($data);





        return redirect('/admin/ship-model');


    }








    // ==========================
    // DELETE
    // ==========================

    public function destroy($id)
    {


        $ship = ShipModel::findOrFail($id);



        $ship->delete();




        return redirect('/admin/ship-model');


    }




    // ==========================
    // USER SHIP MODEL PAGE
    // ==========================

public function userIndex()
{

    $markers = ShipModel::all();


    return view(
        'user.ar-learning.index',
        compact('markers')
    );

}



}