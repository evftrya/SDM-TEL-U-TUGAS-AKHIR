@props(['title' => null,'hide'=>null])

<p class="px-2 py-2 text-sm text-black title-show">{{$title}}</p>
<p class="px-2 py-2 text-sm text-black title-hide">{{$hide}}</p>


<ul class="space-y-1 mb-4">
    {{ $slot }}
</ul>