<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Cash Ronic') }}</title>
        <link rel="shortcut icon" type="image/x-icon" href="https://cashback.drupole.com/v3/assets/imgs/favicon.ico">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @notifyCss
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="font-sans antialiased">
        <x-notify::notify />
        <div class="min-h-screen bg-gray-100">
            @include('front.layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- Scripts -->
        @notifyJs
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
