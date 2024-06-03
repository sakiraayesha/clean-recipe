@props(['imgFile', 'width' => '20px', 'text' => false])

<a {{ $attributes }}>
    <img src="{{ Vite::asset('resources/images/' . $imgFile) }}" width={{ $width }} />

    @if ($text)
        <span class="font-bold">{{ $text }}</span>
    @endif
</a>