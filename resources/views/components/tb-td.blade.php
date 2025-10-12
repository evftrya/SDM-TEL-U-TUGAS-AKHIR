@props(['type'=>null, 'nama'=>null])

<th data-field="{{$nama}}" data-filter-control="{{$type}}"
    class="px-4 py-3 rounded-lg text-xs font-semibold text-blue-600 uppercase tracking-wider">
    {{$slot}}
</th>
