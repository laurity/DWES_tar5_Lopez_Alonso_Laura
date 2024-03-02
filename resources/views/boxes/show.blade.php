<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cajas/Ver') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('boxes.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none mb-8">
            Atrás
        </a>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-800">
            <div class="mb-4">
                <label for="label" class="block text-gray-700 text-sm font-bold mb-2">Etiqueta:</label>
                <p>{{ $box->label }}</p>
            </div>

            <div class="mb-4">
                <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Ubicación:</label>
                <p>{{ $box->location }}</p>
            </div>

            <table class="table-auto w-full mt-10">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-gray-600">Imagen</th>
                        <th class="px-4 py-2 text-gray-600">Nombre</th>
                        <th class="px-4 py-2 text-gray-600">Caja</th>
                        <th class="px-4 py-2 text-gray-600">Acciones</th>
                    </tr>
                </thead>
                <tbody id="items">
                    @foreach ($items as $item)
                        <tr>
                            <td class="border px-4 py-2 pt-5">
                                <div class="flex justify-center h-20 w-20">
                                    <img src="{{ $item->picture ? asset(Storage::url($item->picture)) : 'https://via.placeholder.com/150' }}" alt="{{ $item->name }}" class="h-20 w-20">
                                </div>
                            </td>

                            <td class="border px-4 py-2">{{ $item->name }}</td>
                            <td class="border px-4 py-2">{{ $item->box_id ? $item->box->label : 'Caja no asignada' }}</td>
                            
                            <td class="border px-4 py-2">
                                <div class="flex space-x-2">
                                    <a href="{{ route('items.show', $item->id) }}" class="inline-block bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Ver</a>
                                    <a href="{{ route('items.edit', $item->id) }}" class="inline-block bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                    </form>
                                    <a href="{{ route('items.show', $item->id) }}" class="inline-block bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Prestar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
            <div class="py-12 max-w-7xl mx-auto ">
    <div class="flex space-x-2 mb-8">
        <a href="{{ route('boxes.edit', $box->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
            Editar
        </a>
        <form action="{{ route('boxes.destroy', $box->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none">
                Eliminar
            </button>
        </form>
        <a href="{{ route('boxes.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none">
            Volver a la lista
        </a>
    </div>

</div>
        </div>
        
    </div>
</x-app-layout>