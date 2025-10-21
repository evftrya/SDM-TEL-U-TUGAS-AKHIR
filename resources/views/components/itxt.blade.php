@props([
    'lbl',
    'type' => 'text',
    'val' => null,
    'plc' => 'Isi Disini',
    'nm' => '',
    'req' => true,
    'dis' => false,
])

<div class="flex flex-col gap-1">
    <label class="text-sm text-gray-600 font-medium">
        {{ $lbl }}
        @if($req)
            *
        @endif
    </label>

    <input
        type="{{ $type }}"
        name="{{ $nm }}"
        placeholder="{{ $plc }}"
        value="{{ old($nm, $val) }}"
        @if($req) required @endif
        @if($dis) disabled @endif
        class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400"
    >
</div>
