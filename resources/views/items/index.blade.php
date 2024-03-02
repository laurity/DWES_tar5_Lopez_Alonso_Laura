<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Objetos') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <input type="text" id="search" class="w-25 border p-2 mb-4 rounded" placeholder="Buscar items..." />
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" id="btn-search">Buscar</button>
                    <br>
                <button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                    <a href="{{ route('items.create') }}">Crear Item</a>
                </button>

                <table class="table-auto w-full mt-10">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-gray-600">Imagen</th>
                            <th class="px-4 py-2 text-gray-600">Nombre</th>
                            <th class="px-4 py-2 text-gray-600">Descripción</th>
                            <th class="px-4 py-2 text-gray-600">Precio</th>
                            <th class="px-4 py-2 text-gray-600">Caja</th>
                            <th class="px-4 py-2 text-gray-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="items">
                        @foreach ($items as $item)
                            <tr>
                            <td class="border px-4 py-2 pt-5">
                                <div class="flex justify-center h-20 w-20">
                                @if ($item->picture)
                                    <img src="{{ asset(Storage::url($item->picture)) }}" alt="{{ $item->name }}" class="h-20 w-20">
                                    @else
                                    <img src="https://via.placeholder.com/150" alt="{{ $item->name }}" class="h-20 w-20">
                                @endif
                                </div>
                                </td>

                                <td class="border px-4 py-2">{{ $item->name }}</td>
                                <td class="border px-4 py-2">{{ $item->description }}</td>
                                <td class="border px-4 py-2">{{ $item->price }}</td>
                                <td class="border px-4 py-2">
                                    <div">
                                        @if ($item->box_id)
                                        {{ $item->box->label }}
                                        @else
                                        Caja no asignada
                                        @endif
                                    </div>
                                </td>
                                
                                <td class="border px-4 py-2">
    <div class="flex space-x-2">
    <div>
    <a href="{{ route('items.show', $item->id) }}"
        class="inline-block bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Ver</a>
</div>
<div>
    <a href="{{ route('items.edit', $item->id) }}"
        class="inline-block bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">Editar</a>
</div>
<div>
    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="inline-block bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
    </form>
</div>
<div>
    <a href="{{ route('items.show', $item->id) }}"
        class="inline-block bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Prestar</a>
</div>
    </div>
</td>
                            </tr>
                        @endforeach
                    </tbody>
            </div>
        </div>
    </div>
</div>

    <script>
     document.getElementById('search').addEventListener('keyup', function() {
    let searchValue = this.value.toLowerCase();
    let rows = document.querySelectorAll('#items tr');

    rows.forEach(row => {
        let itemName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
        if(itemName.indexOf(searchValue) === -1) {
            row.style.display = 'none';
        } else {
            row.style.display = '';
        }
    });
});
    </script>
</x-app-layout>