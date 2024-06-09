@props(['pinned' => false])

<div>
    <div class="w-full relative mb-3">
        <img class="w-full h-auto" src="{{ Vite::asset('resources/images/demo-3.jpeg') }}" />

        @if ($pinned)
            <div class="absolute top-5 right-5 p-2 border border-black/50 rounded-full">
                <img src="{{ Vite::asset('resources/images/pin.svg') }}" width="15px" />
            </div>
        @endif
    </div>

    <x-page-heading>Lorem ipsum dolor sit amet</x-page-heading>

    <p class="text-sm text-justify">
        {{ $slot }}
    </p>
</div>