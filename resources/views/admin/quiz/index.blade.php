<!DOCTYPE html>

<html>

<head>

<title>
Quiz Management
</title>

<style>

.card{

background:white;
padding:20px;
margin:20px;
border-radius:15px;

}

.btn{

background:#0284c7;
color:white;
padding:10px 15px;
border-radius:8px;
text-decoration:none;

}

</style>

</head>


<body>


<h1>
📝 Quiz Management
</h1>



<a href="/admin/quiz/create" class="btn">

+ Create Quiz

</a>



@foreach($quizzes as $quiz)


<div class="card">


<h2>

{{ $quiz->title }}

</h2>


<p>

Module:

{{ $quiz->module->title }}

</p>


<p>

{{ $quiz->description }}

</p>



</div>


@endforeach



</body>

</html>