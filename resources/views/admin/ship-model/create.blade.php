<!DOCTYPE html>
<html>

<head>

<title>Add AR Ship Model</title>

<style>

body{
font-family:Segoe UI;
background:#f1f5f9;
padding:40px;
}

.container{

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


<div class="container">


<h1>
🚢 Add Ship AR Model
</h1>


<form 
method="POST" 
action="/admin/ship-model"
enctype="multipart/form-data">

@csrf


<label>
Ship Name
</label>

<input 
name="name"
placeholder="Example: Container Vessel">

<label>
Marker Image
</label>

<input 
type="file"
name="marker_image"
accept="image/*">

<label>
Reality File (.reality)
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

Interactive 3D ship model for marine learning

</textarea>



<button>
Save AR Model
</button>

<a href="{{ route('ship-model.index') }}" class="back-btn">
    ← Back
</a>


</form>


</div>


</body>

</html>