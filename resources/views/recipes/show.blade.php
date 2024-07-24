<x-layout>
    <section class="sm:w-2/3 sm:float-left">
        <h1 class="font-bold text-xl text-justify mb-1">{{ $recipe->title }}</h1>

        <div class="flex justify-between items-center mb-3 text-black/50">
            <a href="/profiles/{{ $recipe->user_id }}">
                <span class="font-semibold">{{ $recipe->user->username }}</span>
            </a>
            <span class="text-sm">Published on {{ \Carbon\Carbon::parse($recipe->created_at)->isoFormat('MMM Do, YYYY') }}</span>
        </div>
        
        <p class="text-sm text-justify mb-3">{{ $recipe->description }}</p>

        <img src={{ asset($recipe->image) }} class="w-full aspect-video object-cover mb-3" />

        <x-interactions-bar class="mb-6" :likeable="$recipe" />

        <x-recipe-info-card class="grid sm:hidden" :recipe="$recipe" />

        <x-list heading="Ingredients" :list="$recipe->ingredients" fieldName="name" />

        <x-list heading="Instructions" :list="$recipe->instructions" fieldName="text" />

        <x-list class="sm:hidden" heading="Notes" :list="$recipe->notes" fieldName="text" />

        <div class="flex flex-wrap gap-2 mb-5 text-xs">
            @foreach ($recipe->tags as $tag)
                <x-tag :tag="$tag" />
            @endforeach
        </div>

        <div class="my-10">
            <div class="flex gap-2 items-center">
                <h2 class="font-bold">Comments</h2>
                <span class="font-semibold text-black/30">12</span>
            </div>
    
            <form action="/comments" method="POST" class="flex flex-col gap-5 my-5">
                @csrf
                
                <x-forms.input type="text" id="comment" name="comment" placeholder="Add a comment..." inputStyles="w-full" />
    
                <x-button class="ml-auto">Post</x-button>
            </form>
    
            <div class="space-y-2">
                <x-comment-card />  
                <x-comment-card />  
                <x-comment-card />  
                <x-comment-card />  
            </div>
        </div>
    </section> 

    <section class="flex flex-col mt-20 mb-5 sm:float-left sm:w-[calc(33%-2rem)] sm:ml-8 sm:mt-14">
        <div class="flex flex-col items-center bg-[#F0EBE3] p-3 mb-5">
            <img src={{ asset($recipe->user->profile->image ?? 'defaults/profile-image.svg') }} class="size-20 rounded-full border border-black/10 object-cover mb-3 -mt-10" />

            <div class="flex flex-col items-center mb-2">
                <h2 class="font-bold text-sm">About The Chef</h2>
                <a href="/profiles/{{ $recipe->user_id }}">
                    <h3 class="font-bold text-black/55 mb-1">{{ $recipe->user->profile->first_name . " " . $recipe->user->profile->last_name}}</h3>
                </a>
                <p class="text-sm text-black/60 self-start text-justify mb-3">{{ $recipe->user->profile->bio }}</p>
            </div>

            @if (auth()->id() == $recipe->user_id)
                <x-button type="button" class="w-fit mx-auto" link="/profiles/{{ $recipe->user_id }}/edit">Edit Profile</x-button>
            @else
                <x-follow-button :user="$recipe->user" />
            @endif
        </div>

        <x-recipe-info-card class="hidden sm:grid" :recipe="$recipe" />

        <x-list class="hidden sm:block" heading="Notes" :list="$recipe->notes" fieldName="text" />

        <div class="w-full flex flex-col items-center gap-5 justify-center mb-5">
            <h2 class="text-center text-lg font-bold">More From The Chef</h2>

            <div class="flex flex-wrap gap-5 justify-center">
                @foreach ($recipe->user->recipes->except($recipe->id) as $moreRecipe)
                    <x-card-small :recipe="$moreRecipe" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="w-full flex flex-col items-center gap-5 justify-center mb-5">
        <h2 class="text-center text-lg font-bold">More Like This Recipe</h2>

        <div class="flex flex-wrap gap-5 justify-center">
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
            <x-card-small>Lorem ipsum dolor sit amet</x-card-small>
        </div>
    </section>
</x-layout>

<script type="module" src="{{ Vite::asset('resources/js/follow.js') }}"></script>