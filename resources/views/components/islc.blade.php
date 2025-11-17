@props(['lbl', 'nm' => null, 'req' => true])
<div class="flex flex-col flex-grow gap-1">
    <label class="text-sm text-gray-600 font-medium">{{ $lbl }} @if ($req)
            *
        @endif
    </label>
    <select name="{{ $nm }}" @if($req) required @endif
        class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
        {{ $slot }}
    </select>
</div>
