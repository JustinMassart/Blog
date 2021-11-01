@props(['name', 'rows'])
<x-form.field>
    <x-form.label name="{{ $name }}"/>
    <textarea name="{{ $name }}" id="{{ $name }}" cols="30" rows="{{ $rows }}"
              class="p-2 w-full border border-gray-200 rounded" required>{{ old( $name ) }}</textarea>
    <x-error-message field="{{ $name }}"/>
</x-form.field>
