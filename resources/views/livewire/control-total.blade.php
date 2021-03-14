

<div class="container mx-auto pt-4
 ">
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Control_Total') }}
        </h2>
    </x-slot>
    <div class="bg-white bg rounded-lg shadow overflow-hidden max-w-4xl mx-auto p-4 mb-6 ">

        <div class="mb-2">
            <label for="nombre" class="form-label mb-2">NOMBRE</label>
            <input wire:model="name" type="text" placeholder="Ingrese Nombre " class="form-control">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label mb-2">DESCRIPCION</label>
            <textarea wire:model="guard_name" id="direccion" rows="2" class="form-control"
                placeholder="Ingresa Descripcion"></textarea>

        </div>
        @if ($accion == "store")
        <button wire:click="store"
            class="bg-orange-600 mb-2 hover:bg-purple-700 text-white rounded  font-bold px-4 py-2">+</button>
        @else

        @can('Edit')

        <button wire:click="update" class="bg-blue-600 mb-2 hover:bg-blue-700 text-white rounded  font-bold px-4 py-2">
            Actualizar</button>
        <button wire:click="default" class="bg-red-600 mb-2 hover:bg-red-700 text-white rounded  font-bold px-4 py-2">
            Cancelar</button>

        @endcan
        @endif
    </div>
    <div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl min-w-max-content mx-auto">

        <table class="bg-white rounded-lg shadow overflow-hidden text-left ">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr class="text-xs  text-gray-800 ">
                    <th class="px-4 py-3 ">ID</th>
                    <th class="px-4 py-3 ">NOMBRE</th>
                    <th class="px-4 py-3">DESCRIPCION</th>
                    <th class="px-4 py-3">ACCIÓN</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($roles as $role)
                <tr class="text-sm text-gray-500 ">
                    <td class="px-4 py-4 font-bold">{{ $role->id }}</td>
                    <td class="px-4 py-4">{{ $role->name }}</td>
                    <td class="px-4 py-4">{{ $role->guard_name }}</td>
                    <td class="px-4 py-4">
                        <button wire:click="edit({{$role}})"
                            class="bg-blue-600 mb-2 hover:bg-blue-700 text-white rounded  font-bold px-4 py-2">Editar</button>
                        <button wire:click="destroy({{$role}})"
                            class="bg-red-500 hover:bg-red-700 text-white rounded font-bold px-4 py-2">Eliminar</button>

                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>

    </div>
</div>

