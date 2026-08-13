<!DOCTYPE html>
<html>

<head>

<title>
{{ $course->title }}
</title>


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



.card{

background:white;
padding:35px;
border-radius:20px;
box-shadow:0 10px 25px #ddd;
margin-bottom:30px;

}



h1{

color:#0f172a;

}



.video{

position:relative;
padding-bottom:56.25%;
height:0;
overflow:hidden;
border-radius:15px;
margin-top:20px;

}


.video iframe{

position:absolute;
width:100%;
height:100%;
left:0;
top:0;

}



.btn{

display:inline-block;

background:#0284c7;

color:white;

padding:12px 25px;

border-radius:10px;

text-decoration:none;

font-weight:bold;

margin-top:20px;

}


.btn:hover{

background:#0369a1;

}



</style>


</head>


<body>


<div class="container">



<!-- COURSE INTRO -->

<div class="card">


<h1>

📘 {{ $course->title }}

</h1>


<p>

{{ $course->description }}

</p>


</div>





<!-- ASSESSMENT -->

<div class="card">


<h2>

🎯 Course Assessment

</h2>


<p>

Complete the learning video before attempting the quiz.

</p>




<!-- YOUTUBE VIDEO -->


<h3>

🎬 Lesson Video

</h3>



<div class="video">


<iframe

src="https://www.youtube.com/embed/HTFRdrOIldY"

allowfullscreen>

</iframe>


</div>




@foreach($course->quizzes as $quiz)


<a class="btn"

href="{{ route('quiz.show',$quiz->id) }}">

🚀 Start Quiz

</a>



@endforeach



</div>





</div>


</body>


</html>