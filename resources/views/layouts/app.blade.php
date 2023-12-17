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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('/assets/js/script.js') }}" defer></script>
    </head>
    <body class="bg-stone-800">
        <nav>
            @include('layouts.navigation')
        </nav>

        <header class="my-10">
            <!-- 共通のヘッダー内容はここに記述 -->
            @include('layouts.header')
        </header>
    
        <main>
            <!-- メインコンテンツはここに表示されます -->
            @yield('content')
        </main>
    
        <footer>
            <!-- 共通のフッター内容はここに記述 -->
            @include('layouts.footer')
        </footer>
    </body>
</html>
