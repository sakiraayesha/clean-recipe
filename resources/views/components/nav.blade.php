<nav class="fixed top-0 z-10 flex items-center w-[calc(100%-1.50rem)] min-[450px]:w-[calc(100%-2.50rem)] py-5 mx-3 min-[450px]:mx-5 bg-white border-b-2 border-black/10">
    <div class="min-[380px]:flex-1 cursor-pointer">
        <div class="lg:hidden hover:opacity-50 explore">
            <img src="{{ Vite::asset('resources/images/menu.svg') }}" class="w-4 min-[450px]:w-5 md:hidden" />
            <span class="hidden md:block text-[#262c29] tracking-wider">Explore</span>
        </div>
        <div class="hidden lg:flex gap-3">
            <span class="text-[#262c29] tracking-wider hover:opacity-50">Lunch</span>
            <span class="text-[#262c29] tracking-wider hover:opacity-50">Dinner</span>
            <span class="text-[#262c29] tracking-wider hover:opacity-50">Healthy</span>
            <span class="text-[#262c29] tracking-wider hover:opacity-50 explore">More</span>
        </div>
    </div>

    <div class="flex-1">
        <a href="/" class="flex justify-center items-center gap-1">
            <img src="{{ Vite::asset('resources/images/logo.svg') }}" class="w-8 min-[450px]:w-10" id="logo"/>
            <span class="text-lg min-[450px]:text-xl font-bold tracking-widest">cleanrecipe</span>
        </a>
    </div>

    <div class="min-[380px]:flex-1 flex items-center min-[400px]:gap-1 min-[500px]:gap-2">
        <div class="ml-auto cursor-pointer hover:opacity-50" id="search-icon">
            <img src="{{ Vite::asset('resources/images/search.svg') }}" class="w-5 min-[450px]:w-6 md:hidden" />
            <span class="hidden md:block text-[#262c29] tracking-wider">Search</span>
        </div>
        <div class="hover:opacity-50">
            <a href="{{ auth()->check() ? '/profiles/' . auth()->id() : '/login' }}">
                <img src="{{ Vite::asset('resources/images/user.svg') }}" class="w-5 min-[450px]:w-6 md:hidden" />
                <span class="hidden md:block text-[#262c29] tracking-wider">{{ auth()->check() ? 'Profile' : 'Log In' }}</span>
            </a>
        </div>
        
        @auth
            <div class="cursor-pointer hover:opacity-50">
                <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')
        
                    <button class="block">
                        <img src="{{ Vite::asset('resources/images/logout.svg') }}" class="w-6 min-[450px]:w-7 md:hidden" />
                        <span class="hidden md:block text-[#262c29] tracking-wider">Log Out</span>
                    </button>
                </form>
            </div>
        @endauth
    </div>

    <div class="hidden fixed top-20 left-0 size-full px-5 py-8 bg-[#f5f5f5]" id="explore-dropdown">
        <div class="w-full grid grid-cols-[repeat(auto-fit,minmax(5rem,1fr))] min-[425px]:grid-cols-[repeat(auto-fit,minmax(6rem,1fr))] min-[500px]:grid-cols-[repeat(auto-fit,minmax(7rem,1fr))] min-[600px]:grid-cols-[repeat(auto-fit,minmax(8rem,1fr))] sm:grid-cols-[repeat(auto-fit,minmax(9rem,1fr))] min-[730px]:grid-cols-[repeat(auto-fit,minmax(12rem,1fr))] gap-2 min-[330px]:gap-4 min-[361px]:gap-8">
            <x-explore-dropdown-section topic="Category" :options="['Breakfast', 'Brunch', 'Healthy', 'Lunch', 'Dinner', 'Dessert']" />
            <x-explore-dropdown-section topic="Cuisine" :options="['Asian', 'Mexican', 'Thai', 'French', 'Middle Eastern']" />
            <x-explore-dropdown-section topic="Festival" :options="['Ramadan', 'Eid', 'Christmas', 'Thanksgiving', 'Diwali', 'Easter', 'Chinese New Year']" />
            <x-explore-dropdown-section topic="Seasonal" :options="['Spring', 'Summer', 'Fall', 'Winter']" />
            <x-explore-dropdown-section topic="Themed" :options="['New Year’s Eve', 'Valentine’s Day', 'Mother’s Day', 'Father’s Day', 'Fourth of July']" />
        </div>
    </div>

    <div class="hidden fixed top-0 left-0 size-full justify-center items-center bg-white opacity-90" id="search-modal">
        <div class="absolute top-5 right-5 cursor-pointer hover:opacity-50" id="close-search">
            <img src="{{ Vite::asset('resources/images/close.svg') }}" class="w-5" />
        </div>
        <div class="px-10 w-full max-w-2xl">
            <form action="/search" method="GET" class="flex pb-5 border-b border-black/20">
                @csrf

                <input type="search" name="q" placeholder="What are you craving today?" class="flex-1 focus-visible:outline-none min-[380px]:text-lg min-[470px]:text-2xl md:text-3xl text-[#262c29] tracking-wider" />
        
                <button type="submit" class="hidden min-[380px]:block hover:opacity-50">
                    <img src="{{ Vite::asset('resources/images/search.svg') }}" class="w-5 min-[470px]:w-6" />
                </button>
            </form>
        </div>
    </div>
</nav>

<script type="module">
    $(function() {
        $('#search-icon').click(function() {
            $('#search-modal').addClass('flex').removeClass('hidden');
        });

        $('#close-search').click(function() {
            $('#search-modal').removeClass('flex').addClass('hidden');
        });

        $('.explore').click(function() {
            $('#explore-dropdown').slideToggle('slow');
        });
    });
</script>