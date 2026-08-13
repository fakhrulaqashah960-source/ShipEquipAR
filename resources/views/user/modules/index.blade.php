<!DOCTYPE html>
<html>

<head>

<title>
Learning Module
</title>


<style>


*{

    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;

}



body{

    background:#eef6fb;
    padding:40px;

}




.container{

    width:90%;
    max-width:1300px;
    margin:auto;

}




.title{

    font-size:38px;
    font-weight:800;
    color:#0f172a;
    margin-bottom:25px;

}





.intro{


    background:white;
    padding:35px;
    border-radius:25px;
    margin-bottom:40px;
    box-shadow:0 10px 25px rgba(0,0,0,.12);


}





.intro h2{

    color:#0284c7;
    margin-bottom:15px;

}





.intro p{

    color:#475569;
    font-size:16px;
    line-height:1.8;

}






.module-container{


    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:25px;


}





.card{


    background:white;
    border-radius:25px;
    padding:25px;
    box-shadow:0 8px 20px rgba(0,0,0,.12);

    display:flex;
    flex-direction:column;

    transition:.3s;


}





.card:hover{

    transform:translateY(-5px);

}






.module-image{


    width:100%;
    height:220px;
    object-fit:contain;
    border-radius:20px;
    margin-bottom:20px;


}







.card h2{


    color:#0284c7;
    font-size:24px;
    margin-bottom:15px;


}







.label{


    font-weight:700;
    color:#0f172a;
    margin-top:15px;

}





.card p{


    color:#475569;
    line-height:1.7;
    margin-top:8px;
    font-size:15px;


}








.equipment-count{


    background:#e0f2fe;
    color:#0369a1;

    padding:10px;

    border-radius:10px;

    margin-top:10px;

    font-weight:600;


}







.btn{


    margin-top:25px;

    display:block;

    text-align:center;

    padding:13px;

    background:#0284c7;

    color:white;

    text-decoration:none;

    border-radius:12px;

    font-weight:600;


}





.btn:hover{


    background:#0369a1;


}





.empty{


    background:white;
    padding:30px;
    border-radius:20px;

}






@media(max-width:900px){


.module-container{

grid-template-columns:1fr;

}


}



</style>


</head>



<body>



<div class="container">





<h1 class="title">

📚 Learning Module

</h1>








<div class="intro">


<h2>

⚓ ShipEquipAR Learning Platform

</h2>



<p>

ShipEquipAR provides an interactive maritime learning platform designed to enhance users' understanding of marine safety equipment, ship security systems and external ship components through digital learning and Augmented Reality technology.

</p>



<br>



<p>

Each module provides detailed learning materials, equipment information, visual references and AR-based visualization to help students understand maritime systems in a more immersive and effective way.

</p>


</div>








<div class="module-container">





@forelse($modules as $module)





<div class="card">







@if($module->image)


<img

src="{{ asset('images/modules/'.$module->image) }}"

class="module-image"

alt="{{ $module->title }}">



@endif







<h2>

📘 {{ $module->title }}

</h2>







<span class="label">

Category

</span>


<p>

{{ $module->category }}

</p>







<span class="label">

Module Overview

</span>


<p>

{{ $module->description }}

</p>







<span class="label">

Learning Content

</span>


<p>

This module contains learning materials, equipment information, functions and practical applications related to maritime engineering.

</p>








<div class="equipment-count">


⚓ 

{{ $module->equipments ? $module->equipments->count() : 0 }}

Equipment Available


</div>

<a href="{{ route('learning.intro',$module->id) }}"
class="btn">

🚢 Start Learning

</a>

</div>


@empty



<div class="empty">


<h3>

No Learning Module Available

</h3>


<p>

Please check again later.

</p>


</div>



@endforelse





</div>






</div>




</body>


</html>