@props(['recipe'])

<a href="/recipes/{{ $recipe->id }}">
    <div class="flex flex-col gap-y-1 max-w-md 2xl:max-w-2xl">
        <h3 class="font-semibold truncate">{{ $recipe->title }}</h3>
    
        <div class="text-sm text-black/50">{{ \Carbon\Carbon::parse($recipe->created_at)->isoFormat('MMM Do, YYYY') }}</div>
    
        <img class="aspect-square object-cover my-2" src="{{ asset($recipe->image) }}" />
    
        <x-interactions-bar class="mb-2" />
    
        <p class="text-sm text-justify">
            {{ $recipe->description }}
        </p>
    </div>
</a>
