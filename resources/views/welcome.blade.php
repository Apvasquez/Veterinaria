<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AVPETSAS</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.6.55/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .fon {
            font-family: 'Pacifico', cursive;
        }
        .font_color{
            color: #3AE04F;
        }
        .items_color{
            color: #E04870;
        }
        .login_color{
            color:#D53DE0;
        }
    </style>
</head>

<body class="bg-fixed" style="background-image: url(img/licor/fondo.jpg)">

    <!-- Nav-Bar-->
    <x-nav-2></x-nav-2>
    <!--Carrousel-->
    <x-slider> </x-slider>
    <!--Card-->
    <x-card>
    </x-card>
    <x-calendar></x-calendar>
 
    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <!-- The "defer" attribute is important to make sure Alpine waits for Livewire to load first. -->


</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="http://localhost/bar_espe/resources/js/app.js"></script>

</html>