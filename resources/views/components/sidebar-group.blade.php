@props(['title' => null,'hide'=>null])

<p class="px-2 py-2 text-sm text-black font-medium title-show sm-hide transition-opacity duration-300">{{$title}}</p>
<p class="px-2 py-2 text-sm text-black font-medium title-hide sm-show transition-opacity duration-300" style="display: none;">{{$hide}}</p>


<ul class="space-y-1 mb-4">
    {{ $slot }}
</ul>