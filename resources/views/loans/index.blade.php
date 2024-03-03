<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Préstamos') }}
        </h2>
    </x-slot>
    <div class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <table class="min-w-full w-full" id="loans-table" data-auth-user-id="{{ Auth::id() }}">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowraps">
                                Usuario
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowraps">
                                Item
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowraps">
                                Fecha de préstamo
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowraps">
                                Fecha de devolución
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowraps">
                                Fecha de retorno
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loans as $loan)
                        <tr class="loan-row cursor-pointer hover:bg-gray-200" data-id="{{ $loan->id }}" data-user-id="{{ $loan->user_id }}">
                            <td class="px-6 py-4 bg-white">
                                <div class="text-center text-sm font-medium text-gray-900">
                                    {{ $users->find($loan->user_id)->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 bg-white">
                                <div class="text-center text-sm font-medium text-gray-900">
                                    {{ $items->find($loan->item_id)->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap bg-white">
                                <div class="text-center text-sm font-medium text-gray-900">
                                    {{ $loan->checkout_date }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap bg-white">
                                <div class="text-center text-sm font-medium text-gray-900">
                                    {{ $loan->due_date }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap bg-white">
                                <div class="text-center text-sm font-medium text-gray-900">
                                    @if ($loan->returned_date === null)
                                    @if ($loan->user_id === Auth::id())
                                    <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-blue-600 hover:underline focus:outline-none">
                                           Marcar como devuelto
                                        </button>
                                    </form>
                                    @else
                                    <span class="text-red-600">No devuelto</span>
                                    @endif
                                    @else
                                    {{ $loan->returned_date }}
                                    @endif
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