<x-layout>
    <section class="w-full px-3 pb-10 mb-10 sm:w-48 md:w-64 sm:float-left sm:mr-4 xl:w-80 flex flex-col gap-7 border-b border-black/10">
        <div class="flex flex-col gap-1 items-center">
            <img src={{ Vite::asset('resources/images/profile.jpg') }} class="size-20 rounded-full object-cover" />
            <h3 class="font-bold">{{ $profile->first_name . " " . $profile->last_name}}</h3>
            <h3 class="font-bold text-sm text-black/35">{{ "@" . $profile->user->username }}</h3>
        </div>

        <div class="space-y-2">
            <div class="flex font-bold text-sm pb-2 border-b border-black/10">
                <span>Followers</span><span class="ml-auto">219</span>
            </div>
            <div class="flex font-bold text-sm pb-2 border-b border-black/10">
                <span>Followings</span><span class="ml-auto">176</span>
            </div>
        </div> 

        <div class="space-y-1">
            <h3 class="font-bold">About</h3>
            <p class="text-sm text-black/60">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            </p>
        </div>

        <div class="space-y-2">
            <h3 class="font-bold">Links</h3>
            <div class="inline-flex space-x-5">
                <x-icon-link href="/" imgFile="instagram.svg" />
                <x-icon-link href="/" imgFile="tiktok.svg" />
                <x-icon-link href="/" imgFile="facebook.svg" />
                <x-icon-link href="/" imgFile="twitter.svg" />
                <x-icon-link href="/" imgFile="linkedin.svg" />
            </div>
        </div>

        @if (auth()->id() == $profile->user_id)
            <button class="p-2 border border-black/60">Edit Profile</button>
        @endif
    </section>

    <section class="flex flex-col gap-10 sm:w-[calc(100% - 13rem)] md:w-[calc(100% - 17rem)] xl:w-[calc(100% - 21rem)]">
        <x-page-subsection class="space-y-5" heading="Highlights">
            <div class="flex flex-wrap gap-5 justify-center text-center">
                <x-card-round>Brunch</x-card-round>
                <x-card-round>Dessert</x-card-round>
                <x-card-round>Asian</x-card-round>
                <x-card-round>Brunch</x-card-round>
                <x-card-round>Dessert</x-card-round>
                <x-card-round>Asian</x-card-round>
                <x-card-round>Asian</x-card-round>
            </div>
        </x-page-subsection>

        <x-page-subsection class="w-full pb-2 border-b border-black/10">
            <x-header pinned=true>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia tempor orci nec vulputate. Integer et velit quis tellus tristique eleifend et ut leo. Nulla facilisi. Quisque et efficitur sem, vitae aliquam arcu. Donec eleifend efficitur imperdiet.
                
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id imperdiet tellus. Duis massa nulla, aliquam at felis vitae, facilisis sollicitudin neque. Mauris scelerisque mauris scelerisque ipsum condimentum, in dignissim sem scelerisque. Integer pharetra viverra dolor, vitae imperdiet justo commodo at. Maecenas vel lacus id dui vulputate tristique ac sed odio. Suspendisse sed dignissim orci. Ut tincidunt vehicula nisl, non mollis elit rutrum ut. Donec venenatis lorem ac ex porta, a sodales diam congue. Nulla massa arcu, luctus et pulvinar nec, sollicitudin at quam. Curabitur maximus pretium libero id eleifend.

                Donec blandit mi in consectetur condimentum. Etiam pretium eros sit amet laoreet facilisis. Phasellus eu nunc leo. Vivamus venenatis enim arcu. Nulla vel turpis justo. Maecenas justo massa, malesuada eu massa pharetra, vulputate varius urna. Nulla in neque accumsan, maximus tellus eu, vehicula arcu. Nulla a congue nibh.
            </x-header>
        </x-page-subsection>

        @if (auth()->id() == $profile->user_id)
            <x-page-subsection class="space-x-5">
                <x-button>Post Recipe</x-button>
                <x-button>Add Highlight</x-button>
            </x-page-subsection>
        @endif

        <x-page-subsection class="w-full grid grid-cols-[repeat(auto-fit,minmax(11rem,1fr))] gap-5">
            <x-post-card />
            <x-post-card />
            <x-post-card />
            <x-post-card />
            <x-post-card />
        </x-page-subsection>
    </section>
</x-layout>