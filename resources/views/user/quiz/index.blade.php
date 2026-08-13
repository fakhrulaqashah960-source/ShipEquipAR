<!DOCTYPE html>
<html>

<head>

<title>Available Quiz</title>


<style>

body{

font-family:'Segoe UI';

background:#f1f5f9;

padding:40px;

}


.container{

max-width:1000px;

margin:auto;

}



h1{

font-size:35px;

color:#0f172a;

}



.card{

background:white;

padding:30px;

border-radius:20px;

margin-top:25px;

box-shadow:0 10px 25px rgba(0,0,0,.1);

}



.card h2{

color:#0284c7;

}



.card p{

color:#475569;

line-height:1.6;

}



.btn{


display:inline-block;

background:#0284c7;

color:white;

padding:12px 25px;

border-radius:10px;

text-decoration:none;

margin-top:15px;

font-weight:bold;

}



.btn:hover{

background:#0369a1;

}


</style>


</head>


<body>


<div class="container">


<h1>
📚 Available Quiz
</h1>



@foreach($courses as $course)


<div class="card">


<h2>

{{ $course->title }}

</h2>



<p>

{{ $course->description }}

</p>



<p>

📖 Total Lesson:

{{ $course->lessons->count() }}

</p>




<a 

href="{{ route('course.enrol',$course->id) }}"

class="btn"

>

🚀 Enrol Now

</a>



</div>


@endforeach



</div>


</body>

</html>