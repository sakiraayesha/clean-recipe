@props(['recipe', 'textPosition' => 'top', 'imageStyle' => 'aspect-video'])

<div class="w-full overflow-hidden">
    <a href="/recipes/{{ $recipe->id ?? 1 }}" class="flex flex-col items-center gap-y-3">
        @if ($textPosition === 'top')
            <h3 class="font-semibold text-xs text-[#262c29] capitalize leading-normal tracking-widest">{{ $recipe->title ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing' }}</h3>
        @endif

        <img class="w-full object-cover transition-transform duration-300 ease-in-out transform hover:scale-[1.02] hover:opacity-95 {{ $imageStyle }}" src={{ asset($recipe->image ?? 'https://images.pexels.com/photos/1395319/pexels-photo-1395319.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') }} />

        @if ($textPosition === 'bottom')
            <h3 class="font-semibold text-xs text-[#262c29] capitalize leading-normal tracking-widest">{{ $recipe->title ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing' }}</h3>
        @endif
    </a>
</div>
