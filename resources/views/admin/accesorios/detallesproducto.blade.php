<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Producto') }}
        </h2>
    </x-slot>
    <div class="panel-title my-8 w-full">
        <h1 class="text-4xl font-semiboldbold font-semibold tracking-wide uppercase text-green-600 text-center">
            {{ $accesorios->nombre }}</h1>
    </div>

    <div class="mx-4 border mb-12  border-green-200  rounded-xl mt-2 shadow-xl pb-13">
        
        <div class="text-xl mx-2 sm:mt-2 md:mt-4 font-mono  p-4 ">

            <div class="flex mx-auto p-4 ">

                <div class="md:w-1/3 sm:w-1/2 pr-2">
                    <strong class="font-bold text-gray-900 text-2xl">Precio:</strong>
                    {{ $accesorios->precio }}
                </div>
                <div class="md:w-1/3 sm:w-1/2 ">
                    <strong class="font-bold text-gray-900 text-2xl">Stock:</strong>
                    {{ $accesorios->stock }}
                </div>
            </div>
            <div class="flex mx-auto p-4  ">
                <div class="w-1/3 pr-2 ">
                    <strong class="font-bold text-gray-900 text-2xl">Creado:</strong>
                    {{ $accesorios->created_at }}
                </div>
                <div class="w-1/3 ">
                    <strong class="font-bold text-gray-900 text-2xl">Actualizado:</strong>
                    {{ $accesorios->updated_at }}
                </div>

            </div>

            <div class="p-4">
                <strong>Galería de Imágenes:</strong>
                <br>

                <!-- Mostramos todas las imágenes pertenecientes a a este registro -->
                @foreach ($imagenes as $img)

                    <a data-fancybox="gallery" href="../../../uploads/{{ $img->nombre }}">
                        <img src="../../../uploads/{{ $img->nombre }}" width="150" class="flex inline-flex">
                    </a>

                @endforeach

                <br><br>

                <a href="{{ route('admin/accesorios') }}"
                    class="p-8 bg-green-600 py-3 px-6 text-white font-bold uppercase text-base rounded hover:bg-green-800">Volver</a>

            </div>

        </div>

    </div>
    </div>

</x-app-layout>

<script src="../../../js/jquery.min.js"></script>
<link rel="stylesheet" href="../../../css/jquery.fancybox.min.css" />
<script src="../../../js/jquery.fancybox.min.js"></script>
<script type="text/javascript">
    function confirmarEliminar() {
        var x = confirm("Estas seguro de Eliminar?");
        if (x)
            return true;
        else
            return false;
    }
</script>
