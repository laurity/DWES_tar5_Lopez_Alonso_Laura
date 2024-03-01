<div>
    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="inline-block bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
    </form>
</div>

<div class="py-5 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative flex justify-between mb-8">
            <div class="flex items-center">
                <a href="{{ route('items.index') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white dark:text-gray-200 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    <svg class="h-5 w-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
                    </svg>
                    <span class="ml-2">Back</span>
                </a>
            </div>
        </div>

        <div class="bg-blue-100 dark:bg-blue-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-3 text-gray-900 dark:text-gray-100 bg-white dark:bg-blue-700">
                <div class="mb-4">
                    <label for="name" class="block text-blue-500 text-sm font-bold mb-2">Name:</label>
                    <p>{{ $item->name }}</p>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-blue-500 text-sm font-bold mb-2">Description:</label>
                    <p>{{ $item->description }}</p>
                </div>

                <div class="mb-4">
                    <label for="picture" class="block text-blue-500 text-sm font-bold mb-2">Picture:</label>
                    @if ($item->picture)
                    <img src="{{ asset(Storage::url($item->picture)) }}" alt="{{ $item->name }}" class="h-60 w-60 rounded-full shadow-lg">
                    @else
                    <img src="https://via.placeholder.com/150" alt="{{ $item->name }}" class="h-60 w-60 rounded-full shadow-lg">
                    @endif
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-blue-500 text-sm font-bold mb-2">Price:</label>
                    <p>${{ $item->price }}</p>
                </div>

                <div>
                    <label for="box" class="block text-blue-500 text-sm font-bold mb-2">Box:</label>
                    <p>
                        @if ($item->box_id)
                        {{ $item->box->label }}
                        @else
                        -
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>