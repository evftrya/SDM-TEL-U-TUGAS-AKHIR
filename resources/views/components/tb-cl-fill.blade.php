@props(['id' => null, 'cls' => null, 'click' => null])

<td 
    class="x-tb-cl-fill fill-table-row px-4 py-3 whitespace-nowrap align-middle {{ $cls }}" 
    id="{{ $id }}"
    @if ($click != null)
        onclick="if (
            !event.target.closest('a, button, [data-no-modal])
        ) { {{ $click }} }"
    @endif
>
    {{ $slot }}
</td>
