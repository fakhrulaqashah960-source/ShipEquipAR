<!DOCTYPE html>

<html>

<head>

<title>Create Quiz</title>

</head>


<body>


<h1>Create Quiz</h1>


<form method="POST" action="/admin/quiz">

@csrf


<label>
Select Module
</label>

<br>


<select name="module_id">

@foreach($modules as $module)

<option value="{{ $module->id }}">
{{ $module->title }}
</option>

@endforeach

</select>


<br><br>


<label>
Quiz Title
</label>

<br>

<input 
type="text" 
name="title"
>


<br><br>


<label>
Description
</label>

<br>

<textarea name="description"></textarea>


<br><br>


<button type="submit">
Save Quiz
</button>


</form>



</body>


</html>