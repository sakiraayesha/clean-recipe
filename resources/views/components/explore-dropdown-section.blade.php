@props(['topic', 'options'])


<div class="flex flex-col gap-2 min-[500px]:gap-4 text-[#262c29]">
    <h2 class="text-sm min-[500px]:text-lg sm:text-xl md:text-2xl opacity-50 tracking-wider uppercase">{{ $topic }}</h2>
    <ul class="space-y-1 text-sm min-[500px]:text-base">
        @foreach ($options as $option)
            <li class="hover:opacity-50 cursor-pointer">
                <a href="/explore/topics/{{ $option }}">{{ $option }}</a>
            </li>
        @endforeach
    </ul>
</div>