@props(['label' => false, 'name'])

<x-forms.field :label="$label" :name="$name">
    <textarea {{ $attributes(['class' => 'block w-full py-2 px-2 border border-black/15 focus-visible:outline-none focus-visible:border-black/30 rounded-lg', 'name' => $name]) }}></textarea>
</x-forms.field>