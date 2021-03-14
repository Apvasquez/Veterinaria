<x-slot name="header">
    <h2 class="font-semibold mt-4 text-xl text-gray-800 leading-tight">
        {{ __('Bars') }}
    </h2>
</x-slot>
<div>
    <div class="container mx-auto pt-4">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Bars') }}
            </h2>
        </x-slot>
        <div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl mx-auto p-4 mb-6 text-red-600">
            <div class="mb-2">
                <label for="nombre" class="form-label mb-2   ">CAMPUS</label>
                <select wire:model="campus" class="form-control" name="campus_id" id="campus_id">
                    @foreach($campuses as $campus)
                    <option value="{{$campus->id}}">
                        {{$campus->nombre}}</option>
                    @endforeach
                </select>
                @error('campus')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2">
                <label for="nombre" class="form-label mb-2 font-bold">NOMBRE</label>
                <input wire:model="nombre" type="text" placeholder="Ingrese Nombre "
                    class="form-control hover:bg-blue-100">
                @error('nombre')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <div class="flex flex-col ">
                    <label for="ABIERTO" class="form-label mb-2 font-bold">ESTADO</label>
                    <label class="inline-flex items-center mt-3">
                        <input wire:model="abierto" type="radio" class="form-radio h-5 w-5" name="abierto" id="abierto"
                            value="{{('1')}}" checked><span class="ml-2 text-gray-700 font-bold">Abierto</span>
                    </label>
                    <label class="inline-flex items-center mt-3">
                        <input type="radio" class="form-radio h-5 w-5 text-red-600" name="abierto" id="abierto"
                            checked="checked" value="{{('0')}}" wire:model="abierto"><span
                            class="ml-2 text-gray-700 font-bold">Cerrado</span>
                    </label>
                    @error('abierto')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            @if ($accion == "store")
            <form wire:submit.prevent="store">
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
                <button class="bg-blue-600 mb-2 hover:bg-blue-700 text-white rounded  font-bold px-4 py-2">+</button>
            </form>
            @else
            <button wire:click="update"
                class="bg-blue-600 mb-2 hover:bg-blue-700 text-white rounded  font-bold px-4 py-2">
                Actualizar</button>
            <button wire:click="default"
                class="bg-red-600 mb-2 hover:bg-red-700 text-white rounded  font-bold px-4 py-2">
                Cancelar</button>
            @endif
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl min-w-max-content mx-auto">
        <table class=" w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr class="text-xs font-medium text-gray-500 uppercase text-left tracking-wider ">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">NOMBRE</th>
                    <th class="px-4 py-3">ABIERTO</th>
                    <th class="px-4 py-3">ACCIÓN</th>
                </tr>
            </thead>
            @php
            $var=1;
            @endphp
            <tbody class="divide-y divide-gray-200">
                @foreach ($bars as $bar)
                <tr class="text-sm text-gray-500 ">
                    <td class="px-6 py-4">{{ $var }}</td>
                    <td class="px-6 py-4">{{ $bar->nombre }}</td>
                    <td class="px-6 py-4">{{ $bar->abierto }}</td>
                    <td class="px-6 py-4">
                        <button wire:click="edit({{$bar}})"
                            class="bg-blue-600 mb-2 hover:bg-blue-700 text-white rounded  font-bold px-4 py-2">Editar</button>
                        <button wire:click="destroy({{$bar}})"
                            class="bg-red-500 hover:bg-red-700 text-white rounded font-bold px-4 py-2">Eliminar</button>

                    </td>

                </tr>
                @php
                $var++;
                @endphp

                @endforeach
            </tbody>
        </table>
        <div class="bg-gray-100 px-6 py-4 border-t border-gray-400">
            {{ $bars->links() }}
        </div>
    </div>
</div>

</div>
