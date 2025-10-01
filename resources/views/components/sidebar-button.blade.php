@props([
    'href' => null,
    'icon' => null,
    'label' => null
])

<li>
    <a href="{{ $href }}"
       class="flex items-center text-base px-2 pl-3 py-2 text-gray-500 hover:bg-gray-800 hover:text-white sm-center">
        <i class="fas {{ $icon }} w-6 text-center mr-3 text-base"></i>
        <span class="sm-hide">{{ $label }}</span>
    </a>
</li>