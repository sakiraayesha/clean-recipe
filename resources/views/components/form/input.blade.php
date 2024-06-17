@props(['label' => false, 'name', 'button' => false, 'buttonClass' => 'add-input'])

@php
    $class = ($button) 
            ? 'block w-[calc(100%-3.95rem)] float-left mr-4 py-2 px-2 border border-black/15 focus-visible:outline-none focus-visible:border-black/30 rounded-lg' 
            : 'block w-full py-2 px-2 border border-black/15 focus-visible:outline-none focus-visible:border-black/30 rounded-lg';
@endphp

<x-form.field :label="$label" :name="$name">
    <input {{ $attributes(['class' => $class, 'name' => $name]) }} />

    @if ($button)
        <button type="button" class="p-2 border border-black/15 hover:bg-black/10 rounded-lg {{ $buttonClass }}">Add</button>

        <input type="hidden" id="{{ $name . '-list' }}" name="{{ $name . '_list' }}" value="" />
        
        <div class="mb-5 space-y-2 hidden p-2 border border-black/15 rounded-lg text-sm" id={{ $name . '-list-container' }}>
            <ul></ul>
        </div>
    @endif
</x-form.field>