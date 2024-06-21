<x-layout>
    <section class="relative flex flex-wrap items-start justify-between gap-5">
        <div class="hidden sm:block w-40 space-y-5">
            <h2 class="text-lg font-bold">Trending</h2>

            <div class="flex flex-col gap-5">
                @foreach ($trendingRecipes as $trendingRecipe)
                    <x-card-small :recipe="$trendingRecipe" />
                @endforeach
            </div>
        </div>
        
        <x-header class="sticky top-24 w-full sm:w-2/3 sm:flex-1">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia tempor orci nec vulputate. Integer et velit quis tellus tristique eleifend et ut leo. Nulla facilisi. Quisque et efficitur sem, vitae aliquam arcu. Donec eleifend efficitur imperdiet.
            <br>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id imperdiet tellus. Duis massa nulla, aliquam at felis vitae, facilisis sollicitudin neque. Mauris scelerisque mauris scelerisque ipsum condimentum, in dignissim sem scelerisque. Integer pharetra viverra dolor, vitae imperdiet justo commodo at. Maecenas vel lacus id dui vulputate tristique ac sed odio. Suspendisse sed dignissim orci. Ut tincidunt vehicula nisl, non mollis elit rutrum ut. Donec venenatis lorem ac ex porta, a sodales diam congue. Nulla massa arcu, luctus et pulvinar nec, sollicitudin at quam. Curabitur maximus pretium libero id eleifend.
            <br>
            Donec blandit mi in consectetur condimentum. Etiam pretium eros sit amet laoreet facilisis. Phasellus eu nunc leo. Vivamus venenatis enim arcu. Nulla vel turpis justo. Maecenas justo massa, malesuada eu massa pharetra, vulputate varius urna. Nulla in neque accumsan, maximus tellus eu, vehicula arcu. Nulla a congue nibh.
            <br>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id imperdiet tellus. Duis massa nulla, aliquam at felis vitae, facilisis sollicitudin neque. Mauris scelerisque mauris scelerisque ipsum condimentum, in dignissim sem scelerisque. Integer pharetra viverra dolor, vitae imperdiet justo commodo at. Maecenas vel lacus id dui vulputate tristique ac sed odio. Suspendisse sed dignissim orci. Ut tincidunt vehicula nisl, non mollis elit rutrum ut. Donec venenatis lorem ac ex porta, a sodales diam congue. Nulla massa arcu, luctus et pulvinar nec, sollicitudin at quam. Curabitur maximus pretium libero id eleifend.
        </x-header>
        
        <div class="hidden lg:block w-1/4 space-y-1">
            <h2 class="text-lg font-bold">Latest Recipes</h2>

            <div class="grid grid-cols-1 gap-4">
                @foreach ($latestRecipes as $latestRecipe)
                    <x-card-wide :recipe="$latestRecipe" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="my-14 space-y-5 lg:hidden">
        <h2 class="text-center text-lg font-bold">Latest Recipes</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach ($latestRecipes as $latestRecipe)
                <x-card-wide :recipe="$latestRecipe" />
            @endforeach
        </div>
    </section>

    <section class="my-14 space-y-10 sm:hidden">
        <h2 class="text-center text-lg font-bold">Trending Recipes</h2>

        <div class="flex flex-wrap gap-5 justify-center">
            @foreach ($trendingRecipes as $trendingRecipe)
                <x-card-small :recipe="$trendingRecipe" />
            @endforeach
        </div>
    </section>

    <section class="my-14 space-y-10">
        <h2 class="text-center text-lg font-bold">Top Chefs</h2>

        <div class="flex flex-wrap gap-5 justify-center">
            @foreach ($topChefs as $chef)
                <x-card-round href="/profile/{{ $chef->id }}" imagePath="{{ $chef->profile->image }}">
                    {{ $chef->profile->first_name . " " . $chef->profile->last_name }} 
                </x-card-round>
            @endforeach
        </div>
    </section>

    <section class="my-14 space-y-10">
        <h2 class="text-center text-lg font-bold">Popular Tags</h2>

        <div class="flex flex-wrap justify-center gap-2 text-sm">
            @foreach ($popularTags as $tag)
                <x-tag :tag="$tag" />
            @endforeach
        </div>
    </section>

    <section class="my-14 space-y-10">
        <h2 class="text-center text-lg font-bold">Explore</h2>

        <div class="flex flex-wrap gap-5 justify-center">
            <x-card-round>Breakfast</x-card-round>
            <x-card-round>Brunch</x-card-round>
            <x-card-round>Appetizer</x-card-round>
            <x-card-round>Lunch</x-card-round>
            <x-card-round>Dinner</x-card-round>
            <x-card-round>Dessert</x-card-round>
            <x-card-round>Asian</x-card-round>
            <x-card-round>Mexican</x-card-round>
            <x-card-round>Middle Estern</x-card-round>
            <x-card-round>Slow Cooker</x-card-round>
        </div>
    </section>
    
    <section class="my-14 space-y-10">
        <h2 class="text-center text-lg font-bold">30 Minutes Or Less</h2>

        <div class="flex flex-wrap gap-5 justify-center items-center">
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
        </div>
    </section>

    <section class="my-14 space-y-10">
        <h2 class="text-center text-lg font-bold">Slow-Cooking Recipes</h2>

        <div class="flex flex-wrap gap-5 justify-center items-center">
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
        </div>
    </section>
</x-layout>