<x-app-layout>
    <div class="py-12 px-16  grid grid-cols-12 gap-6">
        <div class="col-span-7">
            <div class="container flex bg-white shadow rounded">
                @foreach ($imagenes as $img)
                    <div class="flex flex-col-reverse">
                        <div class="max-w-xs  overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                            <div class="px-4 py-2">
                                <h1 class="text-3xl font-bold text-gray-800 uppercase dark:text-white">
                                    {{ $accesorios->nombre }}</h1>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">ACCESORIO</p>
                            </div>

                            <img class="object-cover w-full h-48 mt-2" src="../../../uploads/{{ $img->nombre }}"
                                alt="">
                        </div>
                        <div
                            class="flex items-center justify-between m-1 rounded px-4 self-start flex-1 py-2 bg-green-200">
                            <h1 class="text-lg font-bold text-gray-500 font-mono">${{ $accesorios->precio }} USD</h1>
                            <button
                                class="px-2 py-1 text-xs font-semibold text-gray-900 uppercase transition-colors duration-200 transform bg-gray-400 rounded hover:bg-gray-200 focus:bg-gray-400 focus:outline-none">Add
                                to cart
                            </button>
                        </div>
                    </div>
                @endforeach
                <div class=" text-gray-800   ">
                    <p class="m-8">Información</p>

                </div>

            </div>


        </div>
        <div class="col-span-5">
            @livewire('accesorio-pay', ['accesorios' => $accesorios])
            {{ $accesorios }}
        </div>
    </div>
</x-app-layout>
<script src="../../../js/jquery.min.js"></script>
<link rel="stylesheet" href="../../../css/jquery.fancybox.min.css" />
<script src="../../../js/jquery.fancybox.min.js"></script>
