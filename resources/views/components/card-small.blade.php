@props(['recipe'])

<a href="/recipes/{{ $recipe->id ?? 1 }}">
    <div class="flex flex-col items-center gap-y-3 text-sm">
        <h3 class="font-semibold">{{ $recipe->title ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing' }}</h3>
        <img class="size-40" src={{ asset($recipe->image ?? 'https://images.pexels.com/photos/1395319/pexels-photo-1395319.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') }} />
    </div>
</a>
