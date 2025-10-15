@props(['id' => null, 'cls' => null])
<tr class="x-tb-cl {{ $cls }}" id="{{ $id }}">
    <x-tb-cl-fill cls="numbering"></x-tb-cl-fill>
    {{ $slot }}
</tr>
