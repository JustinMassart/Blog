@props(['name', 'type' => 'text'])
<x-form.field>
    <x-form.label name="{{ $name }}"/>
    <input class="p-2 w-full border border-gray-200 rounded" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
           value="{{ old($name) }}" x-ref="newtitle"
           @input="$refs.slugfield.value = slugify($refs.newtitle.value,'-').toLowerCase()"
           required
           {{ $attributes }} >
    <x-error-message field="{{ $name }}"/>
</x-form.field>
