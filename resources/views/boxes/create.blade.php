<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Objetos/Editar') }}
        </h2>
    </x-slot>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative flex justify-between mb-8">
            <a href="{{ route('boxes.index') }}" class="flex items-center whitespace-nowrap rounded-md border-0 shadow-none px-4 py-2 bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none">
                Atrás
            </a>
        </div>

        <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('boxes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="label" class="block text-gray-700 text-sm font-bold mb-2">Etiqueta:</label>
                        <input type="text" name="label" id="label" class="bg-white rounded-md border-0 shadow-sm px-3 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Ubicación:</label>
                        <input type="text" name="location" id="location" class="bg-white rounded-md border-0 shadow-sm px-3 w-full">
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="inline-flex justify-center w-full rounded-md border-0 shadow-sm px-4 py-2 bg-gray-100 text-sm font-medium text-black hover:bg-gray-300 focus:outline-none">Create Box</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>