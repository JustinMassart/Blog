@props(['post'])
<article {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>

    <div class="px-5 py-6">
        <div>
            @if(!isset($post->thumbnail_path))
                <img src="/images/illustration-3.png" alt="thumbnail" class="rounded-xl">
            @else
                <img src="{{asset('storage/'.$post->thumbnail_path)}}" alt="thumbnail" class="rounded-xl">
            @endif
        </div>

    <div class="flex flex-col justify-between mt-8">
        <header>
            <div class="space-x-2">
                <x-category-button :category="$post->category"/>
            </div>

            <div class="mt-4">
                <h1 class="text-3xl">
                    {{$post->title}}
                </h1>

                <span class="block mt-2 text-xs text-gray-400">
                                        Published <time>{{$post->published_at->diffForHumans()}}</time>
                                    </span>
            </div>
        </header>

        <div class="mt-4 space-y-4 text-sm">
            {!! $post->excerpt !!}
        </div>

        <footer class="flex justify-between items-center mt-8">
            <div class="flex items-center text-sm">
                <img src="https://i.pravatar.cc/100?u={{$post->author->id}}" alt="A random picture" width="60"
                     height="60" class="rounded-xl">
                <div class="ml-3">
                    <a class="text-lg font-bold" href="/?author={{$post->author->username}}">
                        {{$post->author->name}}
                    </a>
                    <h6 class="text-xs">Mascot at Laracasts</h6>
                </div>
            </div>

            <div>
                <a href="/posts/{{$post->slug}}"
                   class="px-4 py-2 text-xs font-semibold bg-gray-200 rounded-full transition-colors duration-300 hover:bg-gray-300"
                >Read More</a>
            </div>
        </footer>
    </div>
    </div>
</article>
