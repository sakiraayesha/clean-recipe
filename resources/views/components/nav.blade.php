<nav class="fixed z-10 flex w-full top-0 px-5 py-2 justify-between items-center bg-[#F3CA52]">
    <x-icon-link href="/" class="flex items-center space-x-1 font-bold" imgFile="logo.svg" width="40px" text="cream puff"/>

    <div class="hidden sm:block relative">
        <input type="text" class="pl-8 pr-2 py-1 border border-black/15 focus-visible:outline-none focus-visible:border-black/30 rounded-full" placeholder="Search recipes..."/>

        <img src="{{ Vite::asset('resources/images/search.svg') }}" width="20px" class="absolute top-2 left-2" />
    </div>

    <div class="flex space-x-3">
        <img src="{{ Vite::asset('resources/images/search.svg') }}" width="20px" class="cursor-pointer sm:hidden" title="Search" />

        <a href="/recipes" class="hidden sm:block">Explore</a>

        <x-icon-link :href="auth()->check() ? '/profile/' . auth()->id() : '/login'" class="sm:hidden" :title="auth()->check() ? 'Profile' : 'Log In'" imgFile="user.svg" width="22px" />

        <a href={{auth()->check() ? '/profile/' . auth()->id() : '/login'}} class="hidden sm:block">{{ auth()->check() ? 'Profile' : 'Log In' }}</a>

        @auth
            <form action="/logout" method="POST">
                @csrf
                @method('DELETE')

                <button class="sm:hidden">
                    <img src="{{ Vite::asset('resources/images/logout.svg') }}" width="20px" title="Log Out" />
                </button>
                
                <button class="hidden sm:block">Log Out</button>
            </form>
        @endauth
    </div>
</nav>