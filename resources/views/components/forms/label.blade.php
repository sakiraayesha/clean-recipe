@props(['fileInput' => false])

@php
    $labelStyles = $fileInput ? 'block w-fit p-2 border border-black/30 rounded-lg cursor-pointer mx-auto text-sm font-semibold' : 'block text-sm font-semibold';
@endphp

<label {{ $attributes(['class' => $labelStyles]) }}>{{ $slot }}</label>