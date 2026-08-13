<!DOCTYPE html>
<html>

<head>

<title>
ShipEquipAR Admin Dashboard
</title>


<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}


body{

min-height:100vh;

background:
linear-gradient(
rgba(3,37,65,.85),
rgba(2,132,199,.65)
),
url('https://images.unsplash.com/photo-1569263979104-865ab7cd8d13');

background-size:cover;

background-position:center;

}



/* =================
SIDEBAR
================= */


.sidebar{

width:250px;

height:100vh;

position:fixed;

background:rgba(15,23,42,.96);

color:white;

padding:25px;

}



.logo{

font-size:26px;

font-weight:800;

margin-bottom:35px;

}



.logo span{

color:#38bdf8;

}




.menu a{

display:block;

padding:13px;

margin:8px 0;

color:#cbd5e1;

text-decoration:none;

border-radius:12px;

transition:.3s;

}



.menu a:hover{

background:#0284c7;

color:white;

}





.logout-btn{

width:100%;

margin-top:25px;

padding:13px;

background:#dc2626;

color:white;

border:none;

border-radius:12px;

cursor:pointer;

font-size:15px;

}



.logout-btn:hover{

background:#b91c1c;

}





/* =================
CONTENT
================= */


.content{

margin-left:250px;

padding:35px;

}





/* HERO */


.welcome{


background:

linear-gradient(
135deg,
rgba(14,116,144,.95),
rgba(15,23,42,.95)
);


border-radius:25px;

padding:40px;

color:white;

display:flex;

justify-content:space-between;

align-items:center;

}



.welcome h1{

font-size:40px;

}



.welcome p{

margin-top:12px;

font-size:17px;

}



.ship{

font-size:90px;

}







/* =================
STATISTICS
================= */


.stats{

margin-top:30px;

display:grid;

grid-template-columns:repeat(4,1fr);

gap:20px;

}



.stat-card{


background:white;

padding:25px;

border-radius:20px;

display:flex;

align-items:center;

gap:20px;

box-shadow:

0 10px 25px rgba(0,0,0,.15);

}



.stat-icon{

font-size:40px;

}



.stat-card h2{

color:#0f172a;

font-size:28px;

}



.stat-card p{

color:#64748b;

}

/* =================
MODULE SECTION
================= */


.title{

margin:35px 0 20px;

color:white;

font-size:30px;

font-weight:700;

}




.modules{


display:grid;

grid-template-columns:repeat(3,1fr);

gap:25px;


}



.card{

background:white;

padding:30px;

border-radius:22px;

transition:.3s;

box-shadow:0 10px 25px rgba(0,0,0,.15);

display:flex;

flex-direction:column;

min-height:330px;

}



.card:hover{


transform:translateY(-8px);


}




.icon{


font-size:50px;

}





.card h2{


margin-top:15px;

color:#0284c7;

font-size:18px;

}




.card h3{


margin-top:8px;

color:#0f172a;

font-size:20px;

}





.card p{

margin-top:15px;

color:#64748b;

line-height:1.6;

flex-grow:1;

}


.btn{

display:block;

width:max-content;

margin-top:auto;

margin-left:auto;

margin-right:auto;

padding:12px 25px;

background:#0284c7;

color:white;

border-radius:12px;

text-decoration:none;

font-weight:600;

transition:.3s;

}




.btn:hover{


background:#0369a1;


}





/* LOWER PANEL */


.bottom{


margin-top:30px;

display:grid;

grid-template-columns:repeat(3,1fr);

gap:25px;


}



.panel{


background:white;

padding:25px;

border-radius:20px;

box-shadow:

0 10px 25px rgba(0,0,0,.15);


}




.panel h2{


color:#0f172a;

}




.panel p{


margin-top:15px;

color:#64748b;

line-height:1.6;

}



</style>

</head>


<body>




<!-- SIDEBAR -->


<div class="sidebar">



<div class="logo">

⚓ Ship<span>EquipAR</span>

</div>



<div class="menu">


<a href="/admin">

🏠 Dashboard

</a>



<a href="/admin/users">

👥 Users

</a>



<a href="/admin/modules">

📚 Learning Module

</a>


<a href="/admin/notes">

📘 Module Notes

</a>


<a href="/admin/equipment">

🦺 Equipment

</a>



<a href="/admin/ship-model">

🚢 Ship Model

</a>



<a href="/admin/course">

📝 Quiz Management

</a>



<a href="#">

🏆 Certificate

</a>




<form method="POST" action="{{route('logout')}}">

@csrf


<button class="logout-btn">

🚪 Logout

</button>


</form>



</div>


</div>








<!-- CONTENT -->


<div class="content">





<div class="welcome">



<div>


<h1>

Welcome Admin to ShipEquipAR

</h1>


<p>

Admin Management Panel

</p>


<p>

Manage maritime learning modules, equipment, AR models and digital content.

</p>



</div>




<div class="ship">

🚢

</div>



</div>









<!-- STATISTICS -->


<div class="stats">



<div class="stat-card">


<div class="stat-icon">

👥

</div>


<div>


<h2>

{{\App\Models\User::count()}}

</h2>


<p>

Total Users

</p>


</div>


</div>





<div class="stat-card">


<div class="stat-icon">

📚

</div>


<div>


<h2>

{{\App\Models\Module::count()}}

</h2>


<p>

Learning Modules

</p>


</div>


</div>





<div class="stat-card">


<div class="stat-icon">

🦺

</div>


<div>


<h2>

{{\App\Models\Equipment::count()}}

</h2>


<p>

Equipment

</p>


</div>


</div>





<div class="stat-card">


<div class="stat-icon">

🚢

</div>


<div>


<h2>

{{\App\Models\ShipModel::count()}}

</h2>


<p>

AR Ship Models

</p>


</div>


</div>





</div>




<div class="title">

📊 System Overview

</div>



<div class="modules">



<div class="card">

<div class="icon">

🚢

</div>

<h2>
🚢 Maritime Learning Platform
</h2>

<p>
ShipEquipAR provides an interactive Augmented Reality maritime learning environment for students and marine engineers to explore ship equipment and safety systems.
</p>


</div>


<div class="card">


<div class="icon">

⚓

</div>


<h2>

Content Management

</h2>


<p>

Manage learning modules, equipment information, videos and AR learning resources for maritime education.

</p>



<a href="/admin/modules" class="btn">

Manage Modules

</a>


</div>



<div class="card">


<div class="icon">

🦺

</div>


<h2>

Safety Equipment Database

</h2>


<p>

Maintain marine safety equipment information including PPE, protective gear and equipment specifications.

</p>



<a href="/admin/equipment" class="btn">

Manage Equipment

</a>


</div>



</div>

</div>


</div>


</div>


</div>

</body>

</html>