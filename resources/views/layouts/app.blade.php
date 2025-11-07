<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    > <!-- REMOVED style="height: fit-content !important; min-height: fit-content !important;" -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#DEDEDE] h-auto hide-scrollbar">
    <div class="flex-shrink w-full min-h-screen bg-gray-100 dark:bg-gray-900 hide-scrollbar">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow dark:bg-gray-800">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

    <!-- Page Content -->
        <main class="flex-shrink-0">
                @yield('content')
        </main>
    </div>
    @yield('script')

</body>
</html>
