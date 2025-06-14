<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Examples') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: #f5e6d3;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white bg-opacity-75 backdrop-blur-lg overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #f5e6d3;">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
                        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
                            <h1 class="text-4xl font-bold text-gray-800 text-center w-full mb-6">Best Examples List</h1>
                        </main>
                    </div>
                    @if (session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative flex items-center gap-2">
                            <span class="material-icons text-green-500">check_circle</span>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex flex-col items-center gap-8">
                        <div class="w-full max-w-md">
                            <form method="POST" action="{{ route('example.store') }}" class="bg-white bg-opacity-50 p-4 rounded-lg shadow-md">
                                @csrf
                                <input type="text" name="name" class="border rounded px-2 py-1 w-full mb-2">
                                <input type="submit" value="do it" class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600 transition">
                            </form>
                        </div>

                        <div class="w-full max-w-md">
                            <h2 class="text-xl font-bold mb-4">Examples List</h2>
                            @if($examples->count() > 0)
                                <ul class="space-y-2">
                                    @foreach($examples as $example)
                                        <li class="border rounded p-2 bg-white bg-opacity-50 shadow-sm hover:bg-opacity-75 transition flex justify-between items-center">
                                            <div class="flex items-center gap-2">
                                                <form method="POST" action="{{ route('example.toggle-complete', $example->id) }}" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-gray-500 hover:text-gray-700">
                                                        @if($example->isComplete)
                                                            <span class="material-icons text-green-500">check_circle</span>
                                                        @else
                                                            <span class="material-icons">radio_button_unchecked</span>
                                                        @endif
                                                    </button>
                                                </form>
                                                <span class="{{ $example->isComplete ? 'line-through text-gray-500' : '' }}">{{ $example->name }}</span>
                                            </div>
                                            <form method="POST" action="{{ route('example.destroy', $example->id) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500">No examples yet.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
