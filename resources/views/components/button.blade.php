@props(['type' => 'submit', 'fill' => true, 'link' => false])

@php
    $buttonStyles = $fill ? 'bg-[#508D4E] hover:bg-[#80AF81] text-white' : 'border border-transparent hover:border-[#80AF81] mr-4';
@endphp

<button {{ $attributes(['type' => $type, 'class' => 'px-8 py-3 text-sm font-semibold rounded-sm tracking-widest ' . $buttonStyles]) }}>
    @if ($link)
        <a href="{{ $link }}">{{ $slot }}</a>
    @else
        {{ $slot }}
    @endif
</button>