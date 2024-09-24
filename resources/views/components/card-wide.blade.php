@props(['recipe'])

<div class="inline-block border-b-2 border-black/10 py-4 h-full">
    <a href="/recipes/{{ $recipe->id }}" class="block size-full">
        <div class="w-20 aspect-square float-right ml-3 overflow-hidden">
            <img class="size-full object-cover transition-transform duration-300 ease-in-out transform hover:scale-[1.02] hover:opacity-95" src="{{ asset($recipe->image) }}"/>
        </div>
        <p class="text-sm text-[#262c29]">
            {{ $recipe->description }}
        </p>
    </a>
</div>