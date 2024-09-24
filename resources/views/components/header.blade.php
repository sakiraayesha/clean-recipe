@props(['pinned' => false])

<div {{ $attributes }}>
    <a href="/">
        <div class="w-full relative mb-5 overflow-hidden">
            <img class="w-full aspect-video object-cover transition-transform duration-300 ease-in-out transform hover:scale-[1.02] hover:opacity-95" src="{{ Vite::asset('resources/images/placeholder-1.jpeg') }}" />
    
            @if ($pinned)
                <div class="absolute top-5 right-5 p-2 border border-black/50 rounded-full">
                    <img src="{{ Vite::asset('resources/images/pin.svg') }}" width="15px" />
                </div>
            @endif
        </div>
    
        <h1 class="text-3xl text-center capitalize mb-5">Lorem ipsum dolor sit amet</h1>
    
        <p class="text-justify">
            {{ $slot }}
        </p>
    </a>
</div>