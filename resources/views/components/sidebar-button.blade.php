@props([
    'href' => null,
    'icon' => null,
    'label' => null,
    'isactive' => 'false',
])

<style>
    
</style>

<li>
    <a href="{{ $href }}"
        title="{{ $label }}" 
        class="flex {{ $isactive }} items-center gap-2 px-4 pl-3 py-2 text-gray-500 hover:bg-gray-800 hover:text-white sm-center">
        <i class="fas {{ $icon }} w-6 text-center text-2xl mr-3 icon-sidebar"></i>
        <span class="sm-hide text-md">{{ $label }}</span>
    </a>
</li>

