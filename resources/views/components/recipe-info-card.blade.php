@props(['recipe'])

@php
    $timeInSeconds = $recipe->total_time;
    $timeInHours = $timeInMins = 0;
    
    if ($timeInSeconds === 0) {
        $totalTime = $timeInSeconds;
    } else {
        $totalTime = '';

        if ($timeInSeconds >= 3600) {
            $timeInHours = (int)($timeInSeconds / 3600);
            $timeInSeconds %= 3600;

            $timeInHoursUnit = $timeInHours > 1 ? ' hours' : ' hour';
            $totalTime .= $timeInHours . $timeInHoursUnit;
        }

        if ($timeInSeconds > 0) {
            $timeInMins = (int)($timeInSeconds / 60);
            
            $totalTime .= $timeInHours > 0 ? ' and ' : '';
            $timeInMinsUnit = $timeInMins > 1 ? ' mins' : ' min';
            $totalTime .= $timeInMins . $timeInMinsUnit;
        }
    }
@endphp

<div {{ $attributes(['class' => 'grid-cols-[repeat(auto-fit,minmax(100px,1fr))] gap-5 p-3 border border-black/15 rounded-md text-sm mb-5']) }}>
    <div class="flex flex-col gap-1 items-center text-center">
        <span class="font-semibold tracking-widest">PREP TIME</span>
        <span class="text-black/50">{{ $recipe->prep_time }} {{ $recipe->prep_time > 0 ? $recipe->prep_time_unit : '' }}</span>
    </div>

    <div class="flex flex-col gap-1 items-center text-center">
        <span class="font-semibold tracking-widest">COOK TIME</span>
        <span class="text-black/50">{{ $recipe->cook_time }} {{ $recipe->cook_time > 0 ? $recipe->cook_time_unit : '' }}</span>
    </div>

    <div class="flex flex-col gap-1 items-center text-center">
        <span class="font-semibold tracking-widest">TOTAL TIME</span>
        <span class="text-black/50">{{ $totalTime }}</span>
    </div>

    <div class="flex flex-col gap-1 items-center text-center">
        <span class="font-semibold tracking-widest">SERVINGS</span>
        <span class="text-black/50">{{ $recipe->servings }}</span>
    </div>

    <div class="flex flex-col gap-1 items-center text-center">
        <span class="font-semibold tracking-widest">CUISINE</span>
        <span class="text-black/50">{{ $recipe->cuisine }}</span>
    </div>
    
    <div class="flex flex-col gap-1 items-center text-center">
        <span class="font-semibold tracking-widest">CATEGORY</span>
        <span class="text-black/50">{{ $recipe->category }}</span>
    </div>
</div>