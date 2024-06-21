@props(['recipe'])

<div class="w-40">
    <a href="/recipes/{{ $recipe->id ?? 1 }}" class="flex flex-col items-center gap-y-3">
        <h3 class="font-semibold text-sm">{{ $recipe->title ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing' }}</h3>
        <img class="size-40" src={{ asset($recipe->image ?? 'https://images.pexels.com/photos/1395319/pexels-photo-1395319.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') }} />
    </a>
</div>
