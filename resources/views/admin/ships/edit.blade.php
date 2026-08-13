<!DOCTYPE html>
<html>

<head>

<title>Edit Ship</title>

</head>


<body>


<h1>
🚢 Edit Ship
</h1>



<form method="POST"
action="{{ route('admin.ships.update',$ship->id) }}">


@csrf

@method('PUT')


<label>
Ship Name
</label>

<br>

<input 
name="name"
value="{{ $ship->name }}">


<br><br>


<label>
Description
</label>

<br>


<textarea name="description">

{{ $ship->description }}

</textarea>



<br><br>


<button>

💾 Update Ship

</button>



</form>



</body>

</html>