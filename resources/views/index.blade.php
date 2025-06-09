<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
                <h1>Hello</h1>
            </main>
        </div>
        @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative flex items-center gap-2">
                    <span class="material-icons text-green-500">check_circle</span>
                    {{ session('success') }}
                </div>
        @endif

        <div class="flex gap-8">
            <div>
                <form method="POST" action="{{ route('example.store') }}">
                    @csrf
                    <input type="text" name="name" class="border rounded px-2 py-1">
                    <input type="submit" value="do it" class="bg-blue-500 text-white px-4 py-1 rounded">
                </form>
            </div>

            <div>
                <h2 class="text-xl font-bold mb-4">Examples List</h2>
                @if($examples->count() > 0)
                    <ul class="space-y-2">
                        @foreach($examples as $example)
                            <li class="border rounded p-2">{{ $example->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">No examples yet.</p>
                @endif
            </div>
        </div>
    </body>
</html>
