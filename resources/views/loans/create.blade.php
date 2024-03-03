<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Préstamos/Crear
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('loans.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="item_id" class="block text-gray-500 text-sm font-bold mb-2">Item:</label>
                        <select name="item_id" id="item_id" class="bg-white rounded-md border border-gray-300 shadow-sm px-3 w-full">
                            <option value="">Select an item</option>
                            @foreach ($items as $item)
                            <option value="{{ $item->id }}" {{ old('item_id', isset($selectedItem) ? $selectedItem : '') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="due_date" class="block text-gray-500 text-sm font-bold mb-2">Día de devolución:</label>
                        <input type="date" name="due_date" id="due_date" class="bg-white rounded-md border border-gray-300 shadow-sm px-3 w-full" value="{{ date('Y-m-d', strtotime('+1 weeks')) }}">
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-100 focus:outline-none">Crear Préstamo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>