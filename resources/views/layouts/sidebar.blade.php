<div class="sidebar">

    <div class="logo">
        ⚓ Ship<span>EquipAR</span>
    </div>

    <div class="menu">

        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active':'' }}">
            🏠 Dashboard
        </a>


        <!-- LEARNING MODULE -->

        <div class="module-title"
             onclick="toggleModule()">

            <span>
                📚 Learning Module
            </span>

            <span id="mainArrow">
                ▼
            </span>

        </div>


        <div id="moduleContent"
             class="module-content">


           @foreach($modules as $module)


<div class="module-item"
     onclick="toggleEquipment({{ $module->id }})">

    <span>
        📖 {{ $module->title }}
    </span>

    <span id="arrow{{ $module->id }}">
        ▼
    </span>

</div>



<div id="equipment{{ $module->id }}"
     class="module-list">


    @foreach($modules as $module)

<a href="{{ route('learning.show',$module->id) }}"
class="block px-4 py-3 text-sm text-gray-600">

📖 {{ $module->title }}

</a>

@endforeach


                </div>


            @endforeach


        </div>





        <a href="{{ route('ship.model') }}">

    🚢 Ship Model

</a>


        <a href="#">
            📘 Module Notes
        </a>


        <a href="{{ route('quiz.index') }}">
            📝 Quiz
        </a>


        <a href="#">
            🏆 Certificate
        </a>


        <a href="#">
            🤖 AI Chatbot
        </a>


        <a href="/profile">
            👤 Profile
        </a>




        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button class="logout-btn">
                Logout
            </button>

        </form>


    </div>

</div>




<script>

function toggleModule(){

    let box=document.getElementById("moduleContent");
    let arrow=document.getElementById("mainArrow");

    box.classList.toggle("active");


    arrow.innerHTML =
    box.classList.contains("active")
    ? "▲"
    : "▼";

}




function toggleEquipment(id){

    let box=document.getElementById("equipment"+id);

    let arrow=document.getElementById("arrow"+id);


    box.classList.toggle("active");


    arrow.innerHTML =
    box.classList.contains("active")
    ? "▲"
    : "▼";

}

</script>