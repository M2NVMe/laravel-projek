<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @vite('resources/css/app.css')
    <title>Admin Page</title>
</head>
<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        {{-- top navigation bar --}}
        <x-topnav>
            <x-slot:logolink>/adminpage</x-slot:logolink>
            <x-slot:leftlogo>https://flowbite.s3.amazonaws.com/logo.svg</x-slot:leftlogo>
        </x-topnav>
        <!-- Sidebar -->
        <x-side-navbar></x-side-navbar>

        <main class="p-4 md:ml-64 h-auto pt-20">
            {{$slot}}
        </main>
      </div>
</body>
</html>
