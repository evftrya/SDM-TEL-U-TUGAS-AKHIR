<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        {{-- Navigation bar using the shared component --}}
        @include('layouts.navigation')

        <main class="w-full">
            <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">


                    <div class="flex flex-col gap-8 md:flex-row"> {{-- Added gap-8 for spacing --}}
                        
                        {{-- Use md:w-5/12 or md:w-1/2 for explicit width instead of md:flex-1 to control flow --}}
                        <div class="flex items-center justify-center min-w-0 p-4 md:w-5/12">
                            <div class="max-w-full text-left">
                                <h1 class="text-[64px] md:text-[128px] leading-none font-extrabold text-[#1C2762] dark:text-gray-100">SDM</h1>
                                <p class="mt-4 text-[20px] md:text-[36px] font-thin text-[#1C2762] dark:text-gray-400">Sistem Pengelolaan Kinerja Pegawai</p>
                            </div>
                        </div>

                        {{-- This column now contains BOTH the cards and the login form, stacked vertically --}}
                        <div class="p-4 md:w-6/12">

                            {{-- Adjusted to grid-cols-2 and lg:grid-cols-3 since the container width is smaller (7/12) --}}
                            <div class="grid grid-cols-1 gap-6 mb-10 sm:grid-cols-2 lg:grid-cols-2">

                                {{-- Card 1: Jumlah Pegawai --}}
                                <x-info-card
                                    title="Jumlah Pegawai"
                                    value="204"
                                    percentage="100%"
                                    percentageColor="green" />

                                {{-- Card 2: Izin (Leave/Permission) --}}
                                <x-info-card
                                    title="Izin"
                                    value="5"
                                    percentage="3%"
                                    percentageColor="#dc3545">
                                    <x-slot name="icon">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                        </svg>
                                    </x-slot>
                                </x-info-card>

                                {{-- Card 3: Cuti --}}
                                <x-info-card
                                    title="Cuti"
                                    value="12"
                                    percentage="8%"
                                    percentageColor="red" />
                                
                                {{-- Card 4: Example for wrap --}}
                                <x-info-card
                                    title="Hadir"
                                    value="187"
                                    percentage="92%"
                                    percentageColor="green" />

                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
    </script>
</body>

</html>