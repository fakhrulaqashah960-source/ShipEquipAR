<!DOCTYPE html>
<html>

<head>

<title>Ship Model Management</title>


<style>

body{

    font-family:'Segoe UI';
    background:#f1f5f9;
    padding:40px;

}


.container{

    max-width:1100px;
    margin:auto;

}


h1{

    color:#0f172a;
    font-size:32px;

}



.add-btn{

    display:inline-block;
    background:#0284c7;
    color:white;
    padding:12px 25px;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;
    margin-bottom:30px;

}


.add-btn:hover{

    background:#0369a1;

}



.ship-container{

    display:flex;
    flex-wrap:wrap;
    gap:25px;

}



.ship-card{

    width:300px;
    background:white;
    padding:20px;
    border-radius:20px;
    box-shadow:0 10px 25px #ddd;

}



.ship-card img{

    width:100%;
    height:150px;
    object-fit:contain;
    background:#f8fafc;
    border-radius:10px;

}



.ship-card h2{

    font-size:22px;
    color:#0f172a;

}



.ship-card p{

    color:#475569;
    line-height:1.5;

}



.edit{

    display:inline-flex;
    background:#2563eb;
    color:white;
    padding:10px 20px;
    border-radius:8px;
    text-decoration:none;
    font-weight:bold;

}



.delete{

    background:#dc2626;
    color:white;
    border:none;
    padding:10px 20px;
    border-radius:8px;
    font-weight:bold;
    cursor:pointer;

}



.delete:hover{

    background:#b91c1c;

}



.back-container{

    margin-top:40px;

}



.back-btn{

    display:inline-flex;
    align-items:center;
    justify-content:center;
    background:#111827;
    color:white;
    padding:12px 30px;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;

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
🚢 Ship Model Management
</h1>



<a href="{{ route('ship-model.create') }}" class="add-btn">

+ Add Ship Model

</a>




<div class="ship-container">



@foreach($ships as $ship)



<div class="ship-card">



@if($ship->marker_image)


<img src="{{ asset('uploads/ship-model/'.$ship->marker_image) }}">


@endif




<h2>

🚢 {{ $ship->name }}

</h2>




<p>

<b>Ship Image:</b><br>

{{ $ship->marker_image }}

</p>




<p>

<b>Reality Model:</b><br>

{{ $ship->model_file }}

</p>




<p>

{{ $ship->description }}

</p>




<a href="{{ route('ship-model.edit',$ship->id) }}"
class="edit">

✏ Edit

</a>




<form action="{{ route('ship-model.destroy',$ship->id) }}"
method="POST"
style="display:inline;">


@csrf

@method('DELETE')



<button type="submit"
class="delete"
onclick="return confirm('Delete this ship model?')">

🗑 Delete

</button>



</form>



</div>



@endforeach



</div>




<div class="back-container">


<a href="{{ route('admin.dashboard') }}"
class="back-btn">

← Back to Dashboard

</a>


</div>



</div>


</body>


</html>