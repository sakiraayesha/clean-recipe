<x-layout>
    <section class="relative flex flex-wrap items-start justify-between gap-9">
        <div class="hidden sm:block w-40 space-y-7">
            <h2 class="text-2xl text-[#262c29] opacity-40 tracking-wider uppercase">Trending</h2>

            <div class="flex flex-col gap-7">
                @foreach ($trendingRecipes as $trendingRecipe)
                    <x-card :recipe="$trendingRecipe" />
                @endforeach
            </div>
        </div>
        
        <x-header class="sticky top-24 w-full sm:w-2/3 sm:flex-1 text-[#262c29]">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia tempor orci nec vulputate. Integer et velit quis tellus tristique eleifend et ut leo. Nulla facilisi. Quisque et efficitur sem, vitae aliquam arcu. Donec eleifend efficitur imperdiet. Integer et velit quis tellus tristique eleifend et ut leo.
        </x-header>
        
        <div class="hidden lg:block w-1/4 space-y-3">
            <h2 class="text-2xl text-[#262c29] opacity-40 tracking-wider uppercase">Latest Recipes</h2>

            <div class="grid grid-cols-1 gap-5">
                @foreach ($latestRecipes as $latestRecipe)
                    <x-card-wide :recipe="$latestRecipe" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="my-24 space-y-7 lg:hidden">
        <h2 class="text-2xl text-[#262c29] opacity-40 tracking-wider uppercase">Latest Recipes</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach ($latestRecipes as $latestRecipe)
                <x-card-wide :recipe="$latestRecipe" />
            @endforeach
        </div>
    </section>

    <section class="my-16 space-y-10 sm:hidden">
        <h2 class="text-2xl text-[#262c29] opacity-40 tracking-wider uppercase">Trending</h2>

        <div class="grid grid-cols-[repeat(auto-fit,minmax(8rem,1fr))] gap-7">
            @foreach ($trendingRecipes as $trendingRecipe)
                <x-card :recipe="$trendingRecipe" textPosition="bottom" imageStyle="aspect-square" />
            @endforeach
        </div>
    </section>

    <section class="my-20 space-y-10">
        <h2 class="text-2xl text-[#262c29] opacity-40 tracking-wider uppercase">Popular Tags</h2>

        <div class="flex flex-wrap gap-5">
            @foreach ($popularTags as $tag)
                <x-tag :tag="$tag" />
            @endforeach
        </div>
    </section>

    <section class="my-20 space-y-10">
        <h2 class="text-2xl text-[#262c29] opacity-40 tracking-wider uppercase">Explore</h2>

        <div class="grid grid-cols-3 lg:grid-cols-6 gap-2 sm:gap-4">
            @foreach ($popularTopics as $topic)
                <div class="relative w-full group">
                    <a href="/explore/topics/{{ $topic->name }}">
                        <img class="w-full object-cover aspect-square min-[500px]:group-hover:scale-[1.02] transition-transform duration-300 ease-in-out transform" src={{ asset($topic->image) }} alt="{{ $topic->name }}" />
                        <div class="bg-[#eff1e5] min-[500px]:bg-transparent absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-300 flex items-end pb-4 justify-center">
                            <span class="text-[#262c29] font-bold text-xs min-[500px]:text-white min-[500px]:font-normal min-[500px]:text-xl min-[500px]:tracking-widest uppercase">{{ $topic->name }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    
    <section class="my-24 space-y-12 bg-[#eff1e5] p-14">
        <h2 class="text-2xl text-[#262c29] opacity-60 tracking-wider uppercase text-center">30 Minutes Or Less</h2>

        <div class="grid grid-cols-[repeat(auto-fit,minmax(8rem,1fr))] gap-7">
            <x-card textPosition="bottom" imageStyle="aspect-square" />
            <x-card textPosition="bottom" imageStyle="aspect-square" />
            <x-card textPosition="bottom" imageStyle="aspect-square" />
            <x-card textPosition="bottom" imageStyle="aspect-square" />
            <x-card textPosition="bottom" imageStyle="aspect-square" />
        </div>
    </section>

    <section class="my-20 space-y-10">
        <h2 class="text-2xl text-[#262c29] opacity-40 tracking-wider uppercase">Top Chefs</h2>

        <div class="grid grid-cols-1 min-[600px]:grid-cols-2 min-[850px]:grid-cols-3 gap-10">
            @foreach ($topChefs as $chef)
                <div class="flex gap-6 text-[#262c29]">
                    <a href="/profiles/{{ $chef->id }}">
                        <img class="size-20 object-cover rounded-full border border-black/10" src="{{ asset($chef->profile->image ?? 'defaults/profile-image.svg') }}" />
                    </a>
                    <div class="flex flex-col gap-2">
                        <a class="flex flex-col gap-1" href="/profiles/{{ $chef->id }}">
                            <h3>{{ $chef->profile->first_name . " " . $chef->profile->last_name}}</h3>
                            <h3 class="text-sm opacity-40">{{ "@" . $chef->profile->user->username }}</h3>
                        </a>
                        
                        @if (auth()->id() !== $chef->id)
                            <x-follow-button :user="$chef->profile->user" />
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>

<script type="module" src="{{ Vite::asset('resources/js/follow.js') }}"></script>