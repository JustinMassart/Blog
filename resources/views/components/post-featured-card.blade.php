@props(['post'])
<article
    class="rounded-xl border border-black border-opacity-0 transition-colors duration-300 hover:bg-gray-100 hover:border-opacity-5">
    <div class="px-5 py-6 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="/images/illustration-1.png" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="flex flex-col flex-1 justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-button :category="$post->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{$post->slug}}">
                            {{$post->title}}
                        </a>
                    </h1>

                    <span class="block mt-2 text-xs text-gray-400">
                        Published
                        <time datetime="{{$post->published_at}}">{{$post->published_at->diffForHumans()}}</time>
                    </span>
                </div>
            </header>

            <div class="mt-2 space-y-4 text-sm">
                    {!! $post->excerpt !!}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="{{asset('storage/'.$post->thumbnail_path)}}" alt="thumbnail">
                    <div class="ml-3">
                        <h5 class="text-xl font-bold">
                            <a class="font-bold" href="/?author={{$post->author->username}}">
                                {{$post->author->name}}
                            </a>
                        </h5>
                        <h6>Mascot at Laracasts</h6>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/posts/{{$post->slug}}"
                       class="px-8 py-2 text-xs font-semibold bg-gray-200 rounded-full transition-colors duration-300 hover:bg-gray-300">
                        Read More
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>
