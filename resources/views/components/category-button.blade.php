@props(['category'])
<a href="/?category={{$category->slug}}" class="px-3 py-1 text-xs font-semibold text-blue-300 uppercase rounded-full border border-blue-300"
   style="font-size: 10px">{{$category->name}}
</a>
