<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cajas/Editar') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        

        <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-800">
    <div class="flex items-center justify-between mb-8">
            <a href="{{ route('boxes.index', $box->id) }}" class="flex items-center whitespace-nowrap rounded-md border border-white shadow-sm px-4 py-2 bg-blue-700 text-sm font-medium text-white hover:bg-blue-900 focus:outline-none">
                Atrás
            </a>
        </div>
        <form action="{{ route('boxes.update', $box->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="label" class="block text-gray-700 text-sm font-bold mb-2">Etiqueta:</label>
                <input type="text" name="label" id="label" value="{{ $box->label }}" class="bg-white rounded-md border border-gray-300 shadow-sm px-3 w-full">
            </div>

            <div class="mb-4">
                <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Ubicación:</label>
                <input type="text" name="location" id="location" value="{{ $box->location }}" class="bg-white rounded-md border border-gray-300 shadow-sm px-3 w-full">
            </div>

            <input type="hidden" name="box" id="box" value="{{ $box->id }}">

            <div class="mb-4">
                <button type="submit" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none">Update Box</button>
            </div>
        </form>
    </div>
</div>

</x-app-layout>