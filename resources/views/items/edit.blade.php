<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            <a href="{{ route('items.index') }}" class="text-black hover:text-gray-700 focus:outline-none focus:underline">Artículos</a> /
            Editar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <a href="{{ route('items.show', $item->id) }}" class="flex items-center whitespace-nowrap rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="-ml-1 mr-2 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Atrás
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-700">
        <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @foreach(['name' => 'Nombre', 'description' => 'Descripción', 'picture' => 'Imagen', 'price' => 'Precio', 'box' => 'Caja'] as $field => $label)
                <div class="mb-4">
                    <label for="{{ $field }}" class="block text-gray-700 text-sm font-bold mb-2">{{ $label }}:</label>
                    @if($field === 'description')
                        <textarea name="{{ $field }}" rows="5" id="{{ $field }}" class="bg-gray-100 rounded-md border border-gray-300 shadow-sm px-3 w-full" style="resize: none;">{{ $item->$field }}</textarea>
                    @elseif($field === 'picture')
                        <input type="file" name="{{ $field }}" id="{{ $field }}" class="bg-gray-100 rounded-md border border-gray-300 shadow-sm px-3 py-3 w-full">
                    @elseif($field === 'box')
                        <select name="box_id" id="box" class="bg-gray-100 rounded-md border border-gray-300 shadow-sm px-3 w-full">
                            <option value="">Selecciona una caja</option>
                            @foreach ($boxes as $box)
                                <option value="{{ $box->id }}" @if ($box->id === $item->box_id) selected @endif>{{ $box->label }}</option>
                            @endforeach
                        </select>
                    @else
                        <input type="{{ $field === 'price' ? 'number' : 'text' }}" name="{{ $field }}" id="{{ $field }}" value="{{ $item->$field }}" class="bg-gray-100 rounded-md border border-gray-300 shadow-sm px-3 w-full">
                    @endif
                </div>
            @endforeach

            <div class="mb-4">
                <button type="submit" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-100 text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none">Actualizar Artículo</button>
            </div>
        </form>
    </div>
</div>
    </div>


    </x-app-layout>