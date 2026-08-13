<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>
        {{ config('app.name', 'Laravel') }}
    </title>


    <!-- Disable Cache -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">



    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
          rel="stylesheet">


    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])


</head>



<body class="font-sans antialiased">


<div class="min-h-screen bg-gray-100">


    {{-- Sidebar except profile --}}

    @if(!request()->routeIs('profile.edit'))

        @include('layouts.sidebar')

    @endif




    @isset($header)

        <header class="bg-white shadow">

            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                {{ $header }}

            </div>

        </header>

    @endisset




    <main>

        {{ $slot }}

    </main>


</div>





<script>


/*
|--------------------------------------------------------------------------
| Prevent Browser Cache After Logout
|--------------------------------------------------------------------------
*/


window.addEventListener("pageshow", function(event)
{


    if(event.persisted)
    {

        window.location.reload();

    }


});




/*
|--------------------------------------------------------------------------
| Check Authentication
|--------------------------------------------------------------------------
*/


@if(!Auth::check())


window.location.href = "{{ route('login') }}";


@endif





/*
|--------------------------------------------------------------------------
| Replace History
|--------------------------------------------------------------------------
*/


window.onload = function()
{

    if(window.history.replaceState)
    {

        window.history.replaceState(
            null,
            null,
            window.location.href
        );

    }

};



</script>

<script>


/*
|--------------------------------------------------------------------------
| Force Reload When Page Comes From Browser Cache
|--------------------------------------------------------------------------
*/


window.addEventListener(
    "pageshow",
    function(event)
    {


        if(event.persisted)
        {

            window.location.reload(true);

        }


    }
);




/*
|--------------------------------------------------------------------------
| Check Session
|--------------------------------------------------------------------------
*/


fetch(window.location.href, {

    headers:{
        "X-Requested-With":"XMLHttpRequest"
    }

})
.then(response => {

    if(response.status === 401)
    {

        window.location.href="/login";

    }

});



</script>


</body>

</html>