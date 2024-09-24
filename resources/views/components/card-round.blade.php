@props(['imagePath' => false])

<div>
    <a {{ $attributes(['class' => 'flex flex-col items-center']) }}>
        <img class="size-20 object-cover rounded-full border border-black/10 hover:border-black/20" src="{{ $imagePath ? asset($imagePath) : Vite::asset('resources/images/placeholder-2.jpeg') }}" />
        <p class="text-[#262c29] font-bold text-sm mt-2">{{ $slot }}</p>
    </a>
</div>