<!DOCTYPE html>
<html>

<head>

<title>{{ $module->title }}</title>


<style>

body{

background:#eef6fb;
font-family:'Segoe UI';
padding:40px;

}


.card{

background:white;
max-width:900px;
margin:auto;
padding:40px;
border-radius:25px;
box-shadow:0 10px 25px #ddd;

}


h1{

font-size:38px;

}


p{

font-size:17px;
line-height:1.8;

}



.start-btn{

display:block;
width:200px;
text-align:center;
margin:30px auto;

background:#0284c7;
color:white;
padding:15px;
border-radius:12px;
text-decoration:none;
font-weight:bold;

}


.back-btn{

display:inline-block;

background:#111827;
color:white;

padding:12px 25px;

border-radius:10px;

text-decoration:none;

}


</style>


</head>


<body>


<div class="card">


<h1>
📘 {{ $module->title }}
</h1>


<p>

{{ $module->description }}

</p>



<h2>

About {{ $module->title }}

</h2>


<p>

{{ $module->function }}

</p>




<a href="{{ route('learning.show',$module->id) }}"
class="start-btn">
🚢 Start Learning
</a>

<a href="{{ route('learning.module') }}"
class="back-btn">

← Back

</a>



</div>


</body>

</html>