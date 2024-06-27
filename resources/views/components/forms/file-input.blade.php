@props(['label' => false, 'name'])

<x-forms.field :label="$label" :fileInput="true" :name="$name">
    <input {{ $attributes(['type' => 'file', 'class' => 'hidden', 'name' => $name]) }} />
</x-forms.field>