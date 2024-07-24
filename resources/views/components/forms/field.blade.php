@props([
    'label',
    'type' => 'text',
    'fileType' => false,
    'id', 
    'name',
    'placeholder' => false,
    'value' => false,
    'inputStyles',
    'addIcon' => false, 
    'unitOptions' => false,
    ])

<div class="relative space-y-2 form-field">
    <x-forms.label for="{{ $id }}" :$type :$fileType>{{ $label }}</x-forms.label>

    @if ($type === 'file')
        <img src="{{ $value ? asset($value) : ''}}" 
            id="preview-image" 
            class="object-cover absolute -top-2 {{ $value ? 'block' : 'hidden'}} {{ $fileType === 'Profile Image' ? 'mx-auto size-44 rounded-full left-[calc(50%-5.5rem)]' : 'hidden size-full left-0' }}" />
        <x-forms.remove-icon :$type :$fileType :$value />
        <x-forms.input :$type :$id :$name />
    @else
        @if (in_array($name, ['ingredients', 'instructions', 'notes', 'tags']))
            <ul class="space-y-2" id="{{ 'added-' . $name . '-list'}}">
                @foreach (json_decode(old($name . '_list'), true) ?? [] as $oldValue)
                    <li class="flex gap-3 items-center">
                        <x-forms.input :$type value="{{ $oldValue }}" :$inputStyles />
                        <x-forms.remove-icon :$type />
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="flex gap-3 items-center">
            @if ($type === 'textarea')
                <x-forms.textarea :$id :$name :$placeholder>{{ $value }}</x-forms.textarea>
            @else
                <x-forms.input :$type :$id :$name :$placeholder :$value :$inputStyles />

                @if ($addIcon)
                    <x-forms.add-icon />
                    <x-forms.input type="hidden" id="{{ $name . '-list' }}" name="{{ $name . '_list' }}" value="{{ old($name . '_list') }}" />
                @endif

                @if ($unitOptions)
                    <x-forms.select name="{{ $name . '_unit' }}" />
                @endif
            @endif
        </div> 
    @endif

    <x-forms.error :error="$errors->first($name)" />
</div>