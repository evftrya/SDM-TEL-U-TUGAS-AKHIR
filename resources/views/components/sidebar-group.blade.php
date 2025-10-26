@props(['title' => null,'hide'=>null])

<<<<<<< HEAD
<p class="px-2 py-2 text-sm text-black sm-hide">{{$title}}</p>
<hr class="sm-show mx-2 hidden mb-4">
{{-- <p class="px-2 py-2 text-sm text-black title-hide">{{$hide}}</p> --}}
=======
<p class="px-2 py-2 text-sm text-black font-medium title-show sm-hide transition-opacity duration-300">{{$title}}</p>
<p class="px-2 py-2 text-sm text-black font-medium title-hide sm-show transition-opacity duration-300" style="display: none;">{{$hide}}</p>
>>>>>>> origin/main


<ul class="space-y-1 mb-4">
    {{ $slot }}
</ul>