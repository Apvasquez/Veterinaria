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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>


</head>
<div class="min-h-screen mb-5 bg-gray-100">
    @livewire('navigation-dropdown')

    <div class="panel-body">

        <section class="">

            <form class="h-screen mb-32 container mx-auto border-gray-900" style="" method="POST"
                action="{{ route('admin/accesorios/update', $accesorios->id) }}" role="form"
                enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                <h1 class="font-bold text-3xl text-center uppercase  ">Actualizar</h1>
                @include('admin.accesorios.frm.prt')
                
            </form>
          
           

        </section>

    </div>
</div>
