<x-slot name="header">
    <h2 class="font-semibold mt-4 text-xl text-red-800 leading-tight">
        {{ __('role') }}
    </h2>
</x-slot>

<div class="m-4  pt-2">
    <div class="mt-10 mb-4">
        <h1 class="text-center text-white text-4xl  sm:text-5xl tracking-wider uppercase font-semibold">AGREGAR ROL </h1>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl mx-auto p-4 mb-6 ">

        <div class="text-center">
            <label class="mb-2 block mx-auto  ">
                <span for="name" class="form-label font-bold mb-2">NOMBRE</label>
            <input wire:model="name" type="text" placeholder="Ingrese el nombre " class="form-input w-1/2 rounded"
                required>
            <div class="text-red-700">
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            </label>

            <label class="block mx-auto font-bold m-5">
                <span class="text-gray-700 form-label">DESCRIPCIÓN</span>
                <textarea wire:model="guard_name" id="direccion" rows="2" class="form-input block w-1/2 mx-auto rounded"
                    placeholder="Ingresa la Descripción"></textarea>
            </label>
        </div>


        @if ($accion == 'store')
            <div class="text-center">
                <button wire:click="store"
                    class="bg-green-500 mb-2 hover:bg-green-700 text-white tracking-wider font-mono text-xl rounded font-bold px-4 py-4">AGREGAR</button>
            </div>

        @else

            {{-- @can('Edit') --}}
            <div class="text-center mt-6">
                <button wire:click="update"
                    class="bg-blue-600 mb-2 hover:bg-blue-700 text-white rounded  font-bold px-4 py-2">
                    Actualizar</button>
                <button wire:click="default"
                    class="bg-red-600 mb-2 hover:bg-red-700 text-white rounded  font-bold px-4 py-2 ">
                    Cancelar</button>
            </div>


            {{-- @endcan --}}
        @endif
        <div class="grid grid-cols-1 divide-y divide-yellow-500">
            <div class="text-white ">
                <h1 class="text-white">_________________________________________________</h1>
            </div>

        </div>
    </div>
    <div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl min-w-max-content mx-auto">

        <table class="bg-white w-full rounded-lg shadow overflow-hidden ">
            <thead class="bg-gray-50  border-b border-gray-200">
                <tr class="form-head  mb-2  uppercase text-center tracking-wider ">
                    <th class="px-4 w- py-3">ID</th>
                    <th class="px-4 py-3">NOMBRE</th>
                    <th class="px-4 py-3">DESCRIPCIÓN</th>
                    <th class="px-4 py-3">ACCIÓN</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 items-center mx-auto w-full">
                @foreach ($roles as $role)
                    <tr class="text-sm text-gray-500 text-center  ">
                        <td class="px-4 py-4">{{ $role->id }}</td>
                        <td class="px-4 py-4">{{ $role->name }}</td>
                        <td class="px-4 py-4">{{ $role->description }}</td>
                        <td class="px-4 py-4">
                            <button wire:click="edit({{ $role }})"
                                class="bg-blue-600 mb-2 hover:bg-blue-700 text-white rounded  font-bold px-4 py-2">Editar</button>
                            <button wire:click="destroy({{ $role }})"
                                class="bg-red-500 hover:bg-red-700 text-white rounded font-bold sm:px-1 px-2 py-2">Eliminar</button>

                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>

    </div>
</div>
