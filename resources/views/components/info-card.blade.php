@php
    // Default to green if not provided
    $color = $percentageColor ?? 'green';
    
    // Map common colors to Tailwind classes
    $colorClass = match ($color) {
        'green' => 'text-green-600',
        'red', 'danger' => 'text-red-600',
        'blue' => 'text-blue-600',
        'indigo' => 'text-blue-900',
        default => 'text-gray-700', // Fallback for unknown input
    };
@endphp

<div class="w-full flex-grow p-6 bg-white shadow-lg rounded-xl">
    {{-- Header Section (Title & Icon) --}}
    <div class="flex items-center justify-between mb-5">
        <span class="text-lg font-semibold text-gray-700">
            {{ $title }}
        </span>
        <div class="flex items-center justify-center w-12 h-12 p-3 text-2xl text-white bg-blue-900 rounded-lg">
            {{-- This slot is where you can pass an icon (SVG or text) --}}
            {{ $icon ?? '' }}
        </div>
    </div>

    {{-- Value Section (The Big Number) --}}
    <div class="mb-2 text-5xl font-bold leading-none text-blue-900">
        {{ $value }}
    </div>

    {{-- Use the generated class instead of the style attribute --}}
    <div class="text-base font-medium {{ $colorClass }}">
        {{ $percentage ?? '' }}
    </div>
</div>