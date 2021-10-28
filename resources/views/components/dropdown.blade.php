@props(['trigger', 'entries'])

{{-- trigger --}}

<div x-data="{show:false}" @click.away="show=false" class="relative">
    <div @click="show = !show">
        {{ $trigger }}
    </div>

    {{-- entries/items --}}

    <div x-show="show" class="overflow-auto absolute z-50 py-2 mt-2 w-full max-h-52 font-semibold bg-gray-100 rounded-xl"
         style="display:none">
        {{ $entries }}
    </div>
</div>
