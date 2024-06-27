@props(['imagePath' => false])

<div class="hover:opacity-60">
    <a {{ $attributes(['class' => 'flex flex-col items-center']) }}>
        <img class="object-cover rounded-full border border-black/10 size-24" src="{{ $imagePath ? asset($imagePath) : Vite::asset('resources/images/demo-4.jpeg') }}" />
        <p class="font-bold text-sm mt-2">{{ $slot }}</p>
    </a>
</div>