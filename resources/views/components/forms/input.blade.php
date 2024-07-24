@props(['type', 'inputStyles'])

@php
    $inputStyles = match ($type) {
        'text', 
        'number', 
        'email', 
        'password', 
        'url' => $inputStyles . ' p-2 border border-black/15 focus-visible:outline-none focus-visible:border-black/30 text-sm',
        'file' => 'hidden',
        'hidden' => 'hidden-input',
    }
@endphp

<input {{ $attributes(['type' => $type, 'class' => $inputStyles]) }} />