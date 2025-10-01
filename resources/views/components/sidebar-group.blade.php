@props(['title' => null])

<p class="px-2 py-2 text-sm text-black">{{$title}}</p>

<ul class="space-y-1 mb-4">
    {{ $slot }}
</ul>