@props(['label' => false, 'name'])

<div class="space-y-2">
    @if ($label)
        <x-forms.label :for="$name">{{ $label }}</x-forms.label>
    @endif

    {{ $slot }}

    <x-forms.error :error="$errors->first($name)" />
</div>