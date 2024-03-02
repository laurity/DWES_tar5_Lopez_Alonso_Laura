<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cajas') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                    <a href="{{ route('boxes.create') }}">Crear Caja</a>
                </button>

                <table class="table-auto w-full mt-10 border-collapse border border-gray-300">
    <thead>
        <tr>
            <th class="px-4 py-2 text-gray-600 border border-gray-300">Etiqueta</th>
            <th class="px-4 py-2 text-gray-600 border border-gray-300">Ubicación</th>
            <th class="px-4 py-2 text-gray-600 border border-gray-300">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($boxes as $box)
        <tr class="box-row cursor-pointer hover:bg-gray-750 border border-gray-300" data-id="{{ $box->id }}">
            <td class="px-6 py-4 border border-gray-300">
                <div class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">
                    {{ $box->label }}
                </div>
            </td>
            <td class="px-6 py-4 border border-gray-300">
                <div class="text-center text-sm text-gray-900 dark:text-gray-200">{{ $box->location }}</div>
            </td>
            <td class="px-6 py-4 border border-gray-300">
    <div class="flex justify-center space-x-2">
        <a href="{{ route('boxes.show', $box->id) }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700 focus:outline-none focus:underline">Ver</a>
        <a href="{{ route('boxes.edit', $box->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:underline">Editar</a>
        <form action="{{ route('boxes.destroy', $box->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700 focus:outline-none focus:underline">Eliminar</button>
        </form>
    </div>
</td>
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>