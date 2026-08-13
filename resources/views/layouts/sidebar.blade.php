<div class="sidebar">


    <div class="logo">

        ⚓ Ship<span>EquipAR</span>

    </div>




    <div class="menu">



        <!-- DASHBOARD -->

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





            @if(isset($modules) && count($modules) > 0)



                @foreach($modules as $module)



                    <a href="{{ route('learning.show',$module->id) }}"

                    class="

                    {{ 
                    request()->routeIs('learning.show') 
                    && request()->route('id') == $module->id 
                    ? 'active'
                    : ''
                    }}

                    ">



                        📖 {{ $module->title }}



                    </a>



                @endforeach





            @else



                <p style="
                color:#94a3b8;
                padding:15px;
                font-size:14px;
                ">

                    No module available

                </p>



            @endif





        </div>









        <!-- NOTES -->


        <a href="{{ route('user.notes') }}"

        class="{{ request()->routeIs('user.notes*') ? 'active':'' }}">

            📘 Module Notes

        </a>







        <!-- QUIZ -->


        <a href="{{ route('quiz.index') }}"

        class="{{ request()->routeIs('quiz.*') ? 'active':'' }}">

            📝 Quiz

        </a>







        <!-- CERTIFICATE -->


        <a href="#">

            🏆 Certificate

        </a>








        <!-- AI CHATBOT -->


        <a href="#">

            🤖 Ship Bot

        </a>







        <!-- PROFILE -->


        <a href="{{ route('profile.edit') }}"

        class="{{ request()->routeIs('profile.*') ? 'active':'' }}">

            👤 Profile

        </a>








        <!-- LOGOUT -->


        <form method="POST"
              action="{{ route('logout') }}">


            @csrf



            <button class="logout-btn">

                🚪 Logout

            </button>



        </form>





    </div>



</div>









<script>


function toggleModule(){


    let box = document.getElementById("moduleContent");


    let arrow = document.getElementById("mainArrow");



    box.classList.toggle("active");



    arrow.innerHTML =

    box.classList.contains("active")

    ? "▲"

    : "▼";



}



</script>