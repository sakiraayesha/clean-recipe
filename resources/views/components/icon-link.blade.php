@props(['imgFile', 'width' => '20px'])

<a {{ $attributes }}>
    <img src="{{ Vite::asset('resources/images/' . $imgFile) }}" width={{ $width }} />
</a>