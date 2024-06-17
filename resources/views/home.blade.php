<x-layout>
    <section class="flex flex-wrap justify-between gap-3">
        <div class="hidden sm:block space-y-5">
            <h2 class="text-center text-lg font-bold">Trending Recipes</h2>

            <div class="flex flex-col gap-5">
                <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
                <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
                <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            </div>
        </div>
        
        <x-header class="w-full sm:w-2/3 sm:flex-1">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia tempor orci nec vulputate. Integer et velit quis tellus tristique eleifend et ut leo. Nulla facilisi. Quisque et efficitur sem, vitae aliquam arcu. Donec eleifend efficitur imperdiet.
            
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id imperdiet tellus. Duis massa nulla, aliquam at felis vitae, facilisis sollicitudin neque. Mauris scelerisque mauris scelerisque ipsum condimentum, in dignissim sem scelerisque. Integer pharetra viverra dolor, vitae imperdiet justo commodo at. Maecenas vel lacus id dui vulputate tristique ac sed odio. Suspendisse sed dignissim orci. Ut tincidunt vehicula nisl, non mollis elit rutrum ut. Donec venenatis lorem ac ex porta, a sodales diam congue. Nulla massa arcu, luctus et pulvinar nec, sollicitudin at quam. Curabitur maximus pretium libero id eleifend.

            Donec blandit mi in consectetur condimentum. Etiam pretium eros sit amet laoreet facilisis. Phasellus eu nunc leo. Vivamus venenatis enim arcu. Nulla vel turpis justo. Maecenas justo massa, malesuada eu massa pharetra, vulputate varius urna. Nulla in neque accumsan, maximus tellus eu, vehicula arcu. Nulla a congue nibh.
        </x-header>
        
        <div class="w-full my-5 md:w-1/4 md:my-0">
            <h2 class="text-center text-lg font-bold">Latest Recipes</h2>

            <div class="flex flex-col">
                <x-card-wide>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia tempor orci nec vulputate. Integer et velit quis tellus tristique eleifend et ut leo. Nulla facilisi.
                </x-card-wide>
                <x-card-wide>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia tempor orci nec vulputate. Integer et velit quis tellus tristique eleifend et ut leo. Nulla facilisi.
                </x-card-wide>
                <x-card-wide>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia tempor orci nec vulputate. Integer et velit quis tellus tristique eleifend et ut leo. Nulla facilisi.
                </x-card-wide>
                <x-card-wide>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia tempor orci nec vulputate. Integer et velit quis tellus tristique eleifend et ut leo. Nulla facilisi.
                </x-card-wide>
            </div>
        </div>

        <div class="w-full space-y-5 sm:hidden">
            <h2 class="text-center text-lg font-bold">Trending Recipes</h2>

            <div class="flex flex-wrap gap-5 justify-center items-center">
                <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
                <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
                <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            </div>
        </div>
    </section>

    <section class="my-10 space-y-5">
        <h2 class="text-center text-lg font-bold">Top Chefs</h2>

        <div class="flex flex-wrap gap-5 justify-center items-center text-center">
            <x-card-round>John Doe</x-card-round>
            <x-card-round>John Doe</x-card-round>
            <x-card-round>John Doe</x-card-round>
            <x-card-round>John Doe</x-card-round>
            <x-card-round>John Doe</x-card-round>
            <x-card-round>John Doe</x-card-round>
        </div>
    </section>

    <section class="my-10 space-y-5">
        <h2 class="text-center text-lg font-bold">Popular Tags</h2>

        <div class="flex flex-wrap justify-center gap-2 text-sm">
            <x-tag>Seafood soup</x-tag>
            <x-tag>Crispy Tofu</x-tag>
            <x-tag>Parmesan lemon chicken</x-tag>
            <x-tag>Beef rice bowl</x-tag>
            <x-tag>Coconut curry chicken</x-tag>
            <x-tag>Salmon sushi</x-tag>
            <x-tag>Grilled shrimp</x-tag>
            <x-tag>Seafood soup</x-tag>
            <x-tag>Crispy Tofu</x-tag>
            <x-tag>Parmesan lemon chicken</x-tag>
            <x-tag>Beef rice bowl</x-tag>
            <x-tag>Coconut curry chicken</x-tag>
            <x-tag>Salmon sushi</x-tag>
            <x-tag>Grilled shrimp</x-tag>
        </div>
    </section>

    <section class="my-10 space-y-5">
        <h2 class="text-center text-lg font-bold">Explore</h2>

        <div class="flex flex-wrap gap-5 justify-center text-center">
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
    
    <section class="my-10 space-y-5">
        <h2 class="text-center text-lg font-bold">30 Minutes Or Less</h2>

        <div class="flex flex-wrap gap-5 justify-center items-center">
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
        </div>
    </section>
</x-layout>