@props(['heading' => false])

<section {{ $attributes }}>
    @if ($heading)
        <x-section-heading>{{ $heading }}</x-section-heading>
    @endif

    {{ $slot }}
</section>