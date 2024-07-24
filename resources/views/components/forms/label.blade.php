@props(['type', 'fileType'])

@php
    $labelStyles = $type !== 'file' ? 
                    'block text-sm font-semibold'
                    : ($fileType === 'Profile Image' ? 
                    'flex justify-center items-center cursor-pointer mx-auto size-44 rounded-full border border-black/15 text-lg text-black/45' 
                    : 'flex justify-center items-center cursor-pointer w-full aspect-square border border-black/15 text-lg text-black/45');
@endphp

<label {{ $attributes(['class' => $labelStyles]) }}>{{ $slot }}</label>