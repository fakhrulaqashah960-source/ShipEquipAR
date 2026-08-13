<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipModel extends Model
{

    protected $table = 'a_r_markers';


    protected $fillable = [
        'name',
        'marker_image',
        'model_file',
        'description'
    ];

}