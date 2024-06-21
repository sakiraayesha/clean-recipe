@props(['recipe'])

<div class="inline-block border-b border-black/50 py-4 h-full">
    <a href="/recipes/{{ $recipe->id }}" class="block size-full">
        <img class="w-24 aspect-square float-right ml-5" src="{{ asset($recipe->image) }}"/>
        <p class="text-sm text-justify">
            {{ $recipe->description }}
        </p>
    </a>
</div>