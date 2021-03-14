<x-slot name="header">
    <h2 class="font-semibold mt-4 text-xl text-gray-800 leading-tight">
        {{ __('Campus') }}
    </h2>
</x-slot>
<div class="container mx-auto pt-4
 ">
    
    <div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl mx-auto p-4 mb-6 ">

        <div class="mb-2 ">
            <label for="nombre" class="form-label mb-2">NOMBRE</label>
            <input wire:model="nombre" type="text" placeholder="Ingrese Nombre " class="form-control">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label mb-2">DIRECCIÓN</label>
            <textarea wire:model="direccion" id="direccion" rows="2" class="form-control"
                placeholder="Ingresa Dirección"></textarea>

        </div>
        @if ($accion == "store")
        <button wire:click="store"
            class="bg-blue-600 mb-2 hover:bg-blue-700 text-white rounded  font-bold px-4 py-2">+</button>
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
        
        <table class="bg-white rounded-lg shadow overflow-hidden ">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr class="text-xs font-medium text-gray-500 uppercase text-left tracking-wider ">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">NOMBRE</th>
                    <th class="px-4 py-3">DIRECCIÓN</th>
                    <th class="px-4 py-3">ACCIÓN</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($campuses as $campus)
                <tr class="text-sm text-gray-500 ">
                    <td class="px-4 py-4">{{ $campus->id }}</td>
                    <td class="px-4 py-4">{{ $campus->nombre }}</td>
                    <td class="px-4 py-4">{{ $campus->direccion }}</td>
                    <td class="px-4 py-4">
                        <button wire:click="edit({{$campus}})"
                            class="bg-blue-600 mb-2 hover:bg-blue-700 text-white rounded  font-bold px-4 py-2">Editar</button>
                        <button wire:click="destroy({{$campus}})"
                            class="bg-red-500 hover:bg-red-700 text-white rounded font-bold px-4 py-2">Eliminar</button>

                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <div class="bg-gray-100 px-6 py-4 border-t border-gray-400">
            {{ $campuses->links() }}
        </div>
    </div>
</div>
