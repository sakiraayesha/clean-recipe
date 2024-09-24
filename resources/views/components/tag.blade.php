@props(['tag'])

<div class="px-6 py-2 rounded-full border border-[#262c29] text-[#262c29] text-sm hover:bg-[#7f8567] hover:border-[#7f8567] hover:text-white">
    <a href="/tags/{{ $tag->id }}">
        {{ $tag->name }}
    </a> 
</div>