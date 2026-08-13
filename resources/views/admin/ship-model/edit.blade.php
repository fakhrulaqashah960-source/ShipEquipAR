<!DOCTYPE html>

<html>

<head>

<title>Edit AR Marker</title>


<style>

body{

font-family:Segoe UI;
background:#f1f5f9;
padding:40px;

}


.card{

background:white;
padding:30px;
border-radius:15px;
max-width:700px;
margin:auto;

}


input,textarea{

width:100%;
padding:12px;
margin-bottom:20px;

border-radius:8px;
border:1px solid #ccc;

}


img{

width:200px;
border-radius:10px;

}


button{

background:#0284c7;
color:white;

padding:12px 25px;

border:none;

border-radius:8px;

}

button:hover{

background:#0369a1;

}


.back{

display:inline-block;
margin-top:20px;
color:#0284c7;
text-decoration:none;

}

.back-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    background: #111827;
    color: white;

    padding: 12px 28px;

    border-radius: 10px;

    font-size: 15px;
    font-weight: 600;

    text-decoration: none;

    margin-left: 10px;

    transition: 0.3s ease;
}

</style>

</head>


<body>


<div class="card">


<h1>
✏️ Edit AR Marker
</h1>



<form 
method="POST"
action="/admin/ship-model/{{ $ship->id }}"
enctype="multipart/form-data">


@csrf

@method('PUT')



<label>
Ship Name
</label>


<input
name="name"
value="{{ $ship->name }}">



<label>
Current Marker Image
</label>

<br>

<img src="{{ asset('uploads/markers/'.$ship->marker_image) }}">


<br><br>


<label>
Change Marker Image
</label>


<input
type="file"
name="marker_image"
accept="image/*">





<label>
Current Reality Model
</label>

<p>

{{ $ship->model_file }}

</p>




<label>
Change Reality File
</label>


<input
type="file"
name="model_file"
accept=".reality">





<label>
Description
</label>


<textarea
name="description">

{{ $ship->description }}

</textarea>




<button>

Update AR Marker

</button>

<a href="{{ route('ship-model.index') }}" class="back-btn">
    ← Back
</a>



</form>


</div>


</body>

</html>