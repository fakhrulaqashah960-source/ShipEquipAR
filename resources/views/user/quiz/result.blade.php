<h1>
Add Question
</h1>


<form method="POST"
action="/admin/quiz/{{ $quiz->id }}/question/store">


@csrf


<label>
Question
</label>

<br>

<textarea name="question"></textarea>


<br><br>


<label>
Option A
</label>

<input 
type="text"
name="option_a"
>


<br>


<label>
Option B
</label>

<input 
type="text"
name="option_b"
>


<br>


<label>
Option C
</label>

<input 
type="text"
name="option_c"
>


<br>


<label>
Option D
</label>

<input 
type="text"
name="option_d"
>


<br><br>



<label>
Correct Answer
</label>


<select name="correct_answer">


<option value="A">
A
</option>


<option value="B">
B
</option>


<option value="C">
C
</option>


<option value="D">
D
</option>


</select>



<br><br>


<button>
Save Question
</button>


</form>