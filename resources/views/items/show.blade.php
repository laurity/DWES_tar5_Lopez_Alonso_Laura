<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items/Show') }}
        </h2>
    </x-slot>
<div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative flex justify-between mb-8">
            <div class="flex items-center">
                <a href="{{ route('items.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    <svg class="h-5 w-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
                    </svg>
                    <span class="ml-2">Back</span>
                </a>
            </div>
        </div>

        

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            
            <div class="p-3 text-gray-900 bg-gray-200 shadow-lg">
            <div class="mb-4">
                    <label for="picture" class="block text-gray-500 text-sm font-bold mb-2">Imagen:</label>
                    @if ($item->picture)
                                        <img src="{{ asset(Storage::url($item->picture)) }}" alt="{{ $item->name }}" class="h-20 w-20">
                                        @else
                                        <img src="https://via.placeholder.com/150" alt="{{ $item->name }}" class="h-20 w-20">
                                        @endif
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-500 text-sm font-bold mb-2">Nombre:</label>
                    <p>{{ $item->name }}</p>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-500 text-sm font-bold mb-2">Descripción:</label>
                    <p>{{ $item->description }}</p>
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-500 text-sm font-bold mb-2">Precio:</label>
                    <p>${{ $item->price }}</p>
                </div>

                <div>
                    <label for="box" class="block text-gray-500 text-sm font-bold mb-2">Caja:</label>
                    <p>
                        @if ($item->box_id)
                        {{ $item->box->label }}
                        @else
                        -
                        @endif
                    </p>
                </div>

                <div class="flex items-center justify-start mt-4">
    <a href="{{ route('items.edit', $item) }}"
        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
        Editar
    </a>

    <form action="{{ route('items.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure?');">
        @csrf
        @method('DELETE')

        <button type="submit"
            class="ml-4 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:shadow-outline-red disabled:opacity-25 transition ease-in-out duration-150">
            Eliminar
        </button>
    </form>
</div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>