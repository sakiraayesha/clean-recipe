@props(['label' => false, 'name'])

<div class="space-y-2">
    @if ($label)
        <x-form.label :for="$name">{{ $label }}</x-form.label>
    @endif

    {{ $slot }}

    <x-form.error :error="$errors->first($name)" />
</div>