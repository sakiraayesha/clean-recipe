<x-layout>
    @php
        $heading = match ($type) {
            'tag' => '#' . $text,
            'topic' => $text . ' Recipes',
            'keyword' => 'Serach results for "' . $text . '"',
        };
    @endphp

    <h1 class="font-bold text-black/40 text-2xl mb-10 text-center">{{ $heading }}</h1>

    <div class="w-full grid grid-cols-[repeat(auto-fit,minmax(11rem,1fr))] gap-5">
        @foreach ($recipes as $recipe)
            <x-recipe-card :recipe="$recipe" />
        @endforeach
    </div>
</x-layout>
