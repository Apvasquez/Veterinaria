<div class="container mx-auto border mb-12  border-green-200  rounded-xl mt-5 shadow-xl pb-13">
    @if (!empty($accesorios->id))
        <div class="pl-4 pr-4 text-xl font-bold mx-auto flex mt-8 text-green-800 font-mono uppercase pb-4">
            <div class=" w-1/3  px-2 ">
                <label for="nombre" class="p-4">Nombre:</label>
                
                    <input class="form-control mx-auto w-full" placeholder="Accesorio " required="required" name="nombre" type="text"
                        id="nombre" value="{{ $accesorios->nombre }}">
                
            </div>

            <div class=" w-1/3  ">
                <label for="precio" class="p-4">Precio:</label>
                
                    <input class="form-control w-full" placeholder="0.00" required="required" name="precio" type="text"
                        id="precio" value="{{ $accesorios->precio }}">
                
            </div>
            <div class=" w-1/3  px-2 ">
                <label for="stock" class="p-4">Stock:</label>
                
                    <input class="form-control w-full " placeholder="100" required="required" name="stock" type="text"
                        id="stock" value="{{ $accesorios->stock }}">
                
            </div>
        </div>
        <div class="pl-12  pb-4  mt-5 text-base font-bold flex   text-gray-800 font-mono uppercase ">

            <div class="form-group">
                <label for="img" class="negrita">Selecciona una imagen:</label>
                <div>
                    <input name="img[]" type="file" id="img" multiple="multiple">
                    

                    @if (!empty($accesorios->imagenes))

                        <span class="text-cool-gray-700 text-xl">Imagen(es) Actual(es): </span>

                        <br>

                        <!-- Mensaje: Imagen Eliminada Satisfactoriamente ! -->
                        @if (Session::has('message'))
                            <div class="alert alert-primary" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif

                        <!-- Mostramos todas las imágenes pertenecientesa a este registro -->
                        <div class="">
                            @foreach ($imagenes as $img)


                                <img src="../../../uploads/{{ $img->nombre }}" width="200" class="img-fluid">

                                <!-- Botón para Eliminar la Imagen individualmente -->
                                <a href="{{ route('admin/accesorios/eliminarimagen', [$img->id, $accesorios->id]) }}"
                                    class="btn btn-danger btn-sm flex flex-row" onclick="return confirmarEliminar();">Eliminar</a>

                            @endforeach
                        </div>

                    @else

                        Aún no se ha cargado una imagen para este producto
                    @endif

                </div>

            </div>
        </div>

@else
<div class="pl-12 text-xl font-bold  mt-8 mb-10 text-green-500 font-mono uppercase w-96 pb-4">
    <div class="">
        <label for="nombre" class="p-4">Nombre:</label>
        <div class=" ">
            <input class="form-control" placeholder="Bicicleta Giant" required="required" name="nombre" type="text"
                id="nombre">
        </div>
    </div>

    <div class="form-group">
        <label for="precio" class="p-4">Precio:</label>
        <div>
            <input class="form-control" placeholder="2500.00" required="required" name="precio" type="text" id="precio">
        </div>
    </div>

    <div class="form-group">
        <label for="stock" class="p-4">Stock:</label>
        <div>
            <input class="form-control" placeholder="35" required="required" name="stock" type="text" id="stock">
        </div>
    </div>

    <div class="form-group">
        <label for="img" class="p-4 ">Selecciona una imagen:</label>
        <div>
            <input name="img[]" type="file" id="img" multiple="multiple">
        </div>
    </div>
</div>

@endif

<div class="ml-12">
    <button class="p-8 bg-green-600 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-green-800"
        type="submit ">Guardar</button>
    <a href="{{ route('admin/accesorios') }}"
        class="p-8 bg-red-600 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-red-800">Cancelar</a>
</div>
</div>
