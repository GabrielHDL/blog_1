<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        {{-- favicon --}}
        <link rel="icon" href="{{asset('assets/favicons/favicon32x32.png')}}" sizes="32x32" />
        <link rel="icon" href="{{asset('assets/favicons/favicon192x192.png')}}" sizes="192x192" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-base-200">
            @livewire('mavigation')

            <!-- Page Content -->
            <main class="pt-16">
                {{ $slot }}
            </main>
        </div>

        <x-footer />

        @stack('modals')

        @livewireScripts
    </body>
</html>
