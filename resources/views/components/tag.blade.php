@props(['tag'])

<div class="bg-[#ACD793] px-3 py-1 rounded-xl font-bold">
    <a href="tags/{{ $tag->id }}">
        {{ $tag->name }}
    </a> 
</div>