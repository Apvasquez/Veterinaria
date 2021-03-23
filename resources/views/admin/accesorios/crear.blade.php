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
<div class=""" bg-gray-100">
    @livewire('navigation-dropdown')
</div>


<div class="panel-body">
    
 
    {{ $message=Session::get('message') }} @include('alerts.request')
 
    <section class=" ">
        
        <form class="pt-6 mb-5 mx-auto  container" method="POST" action="{{ route('admin/accesorios/store') }}" role="form" enctype="multipart/form-data">
           
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
           
            <h1 class="text-4xl mt-16 font-semibold tracking-wide tex uppercase  text-green-600 text-center text-shadow-xl">Crear Accesorio </h1>
            @include('admin.accesorios.frm.prt')
 
        </form>
 
    </section>
 
</div>