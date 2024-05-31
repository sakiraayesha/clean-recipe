<nav class="px-5 py-2 flex justify-between items-center bg-[#EEEDE7]">
    <div>
        <a href="/" class="inline-flex items-center space-x-1">
            <img src="{{ Vite::asset('resources/images/logo.svg') }}" width="40px"/>
            <span class="font-bold">cream puff</span>    
        </a>
    </div>
    

    <div class="hidden sm:block relative">
        <input type="text" class="pl-8 pr-2 py-1 border border-black/15 focus-visible:outline-none focus-visible:border-black/30 rounded-full" placeholder="Search recipes..."/>
        <img class="absolute top-2 left-2" src="{{ Vite::asset('resources/images/search.svg') }}" width="20px"/>
    </div>

    <div class="flex space-x-3 sm:hidden">
        <img class="cursor-pointer" src="{{ Vite::asset('resources/images/search.svg') }}" width="20px"/>
        <x-icon-link href="/" imgFile="user.svg" width="22px" />
    </div>

    <div class="hidden sm:flex space-x-4">
        <a href="/">Recipes</a>
        <a href="/">Sign in</a>
    </div>
</nav>