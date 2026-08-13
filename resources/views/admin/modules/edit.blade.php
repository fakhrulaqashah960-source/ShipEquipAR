<!DOCTYPE html>
<html>

<head>

<title>Edit Module</title>


<style>

body{

    font-family:'Segoe UI';

    background:#f1f5f9;

    padding:40px;

}



.container{

    width:700px;

    margin:auto;

    background:white;

    padding:35px;

    border-radius:20px;

    box-shadow:0 10px 25px #ddd;

}



h1{

    color:#0f172a;

}



label{

    font-weight:600;

    display:block;

    margin-top:15px;

}



input,
textarea{

    width:100%;

    padding:12px;

    margin-top:8px;

    border-radius:10px;

    border:1px solid #ddd;

    font-size:15px;

}



textarea{

    height:120px;

}




/* ERROR MESSAGE */

.error-box{

    background:#fee2e2;

    color:#991b1b;

    padding:15px;

    border-radius:10px;

    margin-bottom:20px;

}



/* BUTTON AREA */

.button-group{

    display:flex;

    align-items:center;

    gap:15px;

    margin-top:25px;

}




/* UPDATE BUTTON */

.update-btn{

    background:#0284c7;

    color:white;

    border:none;

    padding:12px 28px;

    border-radius:8px;

    font-size:14px;

    font-weight:bold;

    cursor:pointer;

}



.update-btn:hover{

    background:#0369a1;

}




/* BACK BUTTON */

.back-btn{

    display:inline-flex;

    align-items:center;

    justify-content:center;

    background:#111827;

    color:white;

    padding:12px 30px;

    border-radius:8px;

    font-size:14px;

    font-weight:bold;

    text-decoration:none;

}



.back-btn:hover{

    background:#000;

    color:white;

}


</style>


</head>


<body>


<div class="container">



<h1>
⚓ Edit Module
</h1>





@if($errors->any())

<div class="error-box">

<ul>

@foreach($errors->all() as $error)

<li>
{{ $error }}
</li>

@endforeach

</ul>

</div>

@endif






<form

action="{{ route('modules.update',$module->id) }}"

method="POST">


@csrf

@method('PUT')





<label>
Module Title
</label>


<input

type="text"

name="title"

value="{{ $module->title }}"

required>

<label>
Category
</label>


<input

type="text"

name="category"

value="{{ $module->category }}"

required>


<label>
Description
</label>


<textarea

name="description"

required>{{ $module->description }}</textarea>



<label>
Function
</label>


<textarea

name="function"

required>{{ $module->function }}</textarea>







<div class="button-group">


<button

type="submit"

class="update-btn">

💾 Update Module

</button>





<a href="{{ route('modules.index') }}"

class="back-btn">

← Back

</a>



</div>





</form>



</div>


</body>

</html>