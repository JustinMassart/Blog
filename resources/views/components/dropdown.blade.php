@props(['trigger', 'entries'])

{{-- trigger --}}

<div x-data="{show:false}" @click.away="show=false">
    <div @click="show = !show">
        {{ $trigger }}
    </div>

    {{-- entries/items --}}

    <div x-show="show" class="py-2 bg-gray-100 w-full mt-2 font-semibold rounded-xl absolute z-50 overflow-auto max-h-52"
         style="display:none">
        {{ $entries }}
    </div>
</div>
