<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Domine:wght@400..700&family=Gothic+A1&family=Oswald:wght@200..700&family=Parisienne&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
         
       <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <body>
        <div class="">            
            @include('layouts.navigation')
            @include('components.alert')     
            @include('components.moving-object')     
            
            <!-- Page Heading -->          
            @if (isset($header))
                <header class="bg-white fixed right-0 z-[99]">
                    <div class="py-6 px-4 sm:px-6 lg:px-8  my-0 ml-auto mr-0">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="w-[87%] my-0 mr-0 ml-auto pt-24" >                
                {{ $slot }}               
            </main>
        </div>   
       
       <script src="{{ asset('js/index.js') }}"></script>  
       <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>   
       

    </body>
</html>
    