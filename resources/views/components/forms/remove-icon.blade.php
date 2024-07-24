@props(['type', 'fileType', 'value'])

@php
    $iconStyles = $type !== 'file' ? 
                'cursor-pointer w-5 input-remove-icon'
                : ('cursor-pointer absolute image-remove-icon ' . ($value ? 'block ' : 'hidden ') . ($fileType === 'Profile Image' ? 
                'w-7 rounded-full border-2 border-white top-2 right-[calc(50%-5rem)]' : 'w-5 top-4 right-5'));
@endphp

<img {{ $attributes(['src' =>  Vite::asset('resources/images/remove.svg'), 'class' => $iconStyles]) }} />