@props(['recipe'])

<div {{ $attributes(['class' => 'flex-wrap gap-3 justify-between p-3 border border-black/15 rounded-md text-sm mb-5']) }}>
    <div class="flex flex-col gap-1 items-center">
        <span class="font-semibold">Prep Time</span>
        <span class="text-black/50">{{ $recipe->prep_time }}</span>
    </div>

    <div class="flex flex-col gap-1 items-center">
        <span class="font-semibold">Cook Time</span>
        <span class="text-black/50">{{ $recipe->cook_time }}</span>
    </div>

    <div class="flex flex-col gap-1 items-center">
        <span class="font-semibold">Servings</span>
        <span class="text-black/50">{{ $recipe->servings }}</span>
    </div>

    <div class="flex flex-col gap-1 items-center">
        <span class="font-semibold">Cuisine</span>
        <span class="text-black/50">{{ $recipe->cuisine }}</span>
    </div>
    
    <div class="flex flex-col gap-1 items-center">
        <span class="font-semibold">Category</span>
        <span class="text-black/50">{{ $recipe->category }}</span>
    </div>
</div>