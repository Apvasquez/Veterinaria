<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accesorios') }}
        </h2>
    </x-slot>
    <div class="min-h-screen bg-gray-100">


        <div class="m-4 pl-8">
            <div class="grid md:grid-cols-2 justify-items-center items-center sm:grid-cols-2 grid-cols-1 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($accesorios as $a)

                    <div class="  p-4 ">
                        <a class="block relative w-60 h-48 rounded overflow-hidden">
                            <img alt="ecommerce" class="object-cover object-center  w-full h-full block"
                                src="../uploads/{{ $a->imagenesaccesorios()->first()->nombre }}">
                        </a>
                        <div class="mt-4  w-60">
                            <h3 class="text-gray-500 text-xl tracking-widest  title-font mb-1">Accesorios </h3>
                            <h2 class="text-gray-900  font-bold text-lg ">{{ $a->nombre }}</h2>
                            <p class="mt-1 ">${{ $a->precio }}</p>

                        </div>
                    </div>
                   




                @endforeach
            </div>




            {{-- @if (Session::has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                    role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                            </svg></div>
                        <div>
                            {{ Session::get('message') }}
                        </div>
                    </div>
                </div>


        </div>
        @endif --}}
            {{-- <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="mt-6 pd-6 container mx-12">
                        <a href="{{ route('admin/accesorios/crear') }}"
                            class="bg-purple-600 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-purple-800">Agregar</a>
                    </div>
                    <section class="example mt-4">

                        <div class="">

                            <table class="table w-full border-collapse border-green-400">
                                <thead>
                                    <tr class="bold  text-2xl text-red-700">
                                        <th class="border border-green-500 px-4 py-2 m-5 ml-12">Nombres</th>
                                        <th class="border border-green-500 px-4 py-2 m-5">Precio</th>
                                        <th class="border border-green-500 px-4 py-2 m-5">Stock</th>
                                        <th class="border border-green-500 px-4 py-2 ">Imagen</th>
                                        <th class="border border-green-500 px-4 py-2 m-5">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($accesorios as $bic)
                                        <tr>
                                            <td class="border border-green-500 px-4 py-2 v-align-middle">
                                                {{ $bic->nombre }}</td>
                                            <td class="border border-green-500 px-4 py-2 v-align-middle">
                                                {{ $bic->precio }}</td>
                                            <td class="border border-green-500 px-4 py-2 v-align-middle">
                                                {{ $bic->stock }}</td>
                                            <td class="border border-green-500 px-0 bg-cover py-2 flex items-center">
                                                <div class="flex flex-wrap -m-4">
                                                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                                                      <a class="block relative h-48 rounded overflow-hidden">
                                                        <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="../uploads/{{ $bic->imagenesaccesorios()->first()->nombre }}">
                                                      </a>
                                                      <div class="mt-4">
                                                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                                                        <h2 class="text-gray-900 title-font text-lg font-medium">The Catalyzer</h2>
                                                        <p class="mt-1">$16.00</p>
                                                      </div>
                                                    </div>
                                                </div>
                                                
                                            </td>
                                            <td class=" bg-cover border border-green-500 px-4 py-2 ">

                                                <form action="{{ route('admin/accesorios/eliminar', $bic->id) }}"
                                                    method="POST" class="form-horizontal " role="form"
                                                    onsubmit="return confirmarEliminar()">

                                                    <input type="hidden" name="_method" value="PUT">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button
                                                        onclick="location.href='{{ url('/admin/accesorios/detallesproducto', [$bic->id]) }}'"
                                                        href="" type="button" class="btn btn-dark">Ver</button>

                                                    <a href="{{ route('admin/accesorios/actualizar', $bic->id) }}"
                                                        class="btn btn-primary">Editar</a>

                                                    <button type="submit" class="btn btn-danger">Eliminar</button>

                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </section>
                </div>
            </div>
        </div> --}}







        </div>

</x-app-layout>
