@props(['heading', 'list', 'fieldName'])

<div {{ $attributes(['class' => 'space-y-2 mb-5']) }}>
    <h2 class="font-bold">{{ $heading }}</h2>
    
    <ul>
        @foreach ($list as $counter => $item)
            <li class="flex flex-wrap gap-2">
                @if ($heading === 'Instructions')
                    <span class="font-bold w-full tracking-wide mt-4">Step {{ $counter + 1 }}</span> 
                @else
                    <span class="text-[#80AF81] text-lg font-bold">&bull;</span> 
                @endif
                <span class="flex-1 self-center text-sm tracking-wide leading-7">{{ $item->$fieldName }}</span>
            </li>
        @endforeach
    </ul>
</div>