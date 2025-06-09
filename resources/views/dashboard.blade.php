<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#7c5c3e] leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#f5e6d3]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white bg-opacity-80 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-[#7c5c3e]">
                    {{ __("You're logged in!") }}
                    <div class="mt-4">
                        <a href="{{ route('examples.index') }}" class="inline-block bg-[#7c5c3e] text-white font-bold py-3 px-6 rounded-lg hover:bg-[#a67c52] transition">
                            Go to Examples
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
