<!DOCTYPE html>

<html>

<head>

<title>Quiz</title>

<style>

body{

font-family:Segoe UI;
background:#f1f5f9;
padding:40px;

}


.card{

background:white;
padding:25px;
border-radius:15px;
margin-bottom:20px;

}


button{

background:#0284c7;
color:white;
padding:12px 25px;
border:none;
border-radius:10px;

}


</style>

</head>


<body>


<h1>
📝 {{ $quiz->title }}
</h1>


<form method="POST"
action="{{route('quiz.submit',$quiz->id)}}">


@csrf



@foreach($quiz->questions as $index=>$question)


<div class="card">


<h3>

{{ $index+1 }}.
{{ $question->question }}

</h3>


<label>

<input type="radio"
name="answer[{{$question->id}}]"
value="A">

{{$question->option_a}}

</label>

<br>


<label>

<input type="radio"
name="answer[{{$question->id}}]"
value="B">

{{$question->option_b}}

</label>


<br>


<label>

<input type="radio"
name="answer[{{$question->id}}]"
value="C">

{{$question->option_c}}

</label>


<br>


<label>

<input type="radio"
name="answer[{{$question->id}}]"
value="D">

{{$question->option_d}}

</label>



</div>


@endforeach



<button>

Submit Quiz

</button>



</form>



</body>

</html>