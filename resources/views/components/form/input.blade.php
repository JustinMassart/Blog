@props(['name', 'type' => 'text'])
<x-form.field>
    <x-form.label name="{{ $name }}"/>
    <input class="p-2 w-full rounded border border-gray-200" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
        {{ $attributes(['value' => old($name)]) }} >
    <x-error-message field="{{ $name }}"/>
</x-form.field>
