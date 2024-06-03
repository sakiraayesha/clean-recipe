@props(['type', 'label', 'name'])

<div class="space-y-2">
    <x-form.label :for="$name">{{ $label }}</x-form.label>
    <x-form.input :type="$type" :name="$name" :placeholder="$label" :value="old($name)" />
    <x-form.error :error="$errors->first($name)" />
</div>