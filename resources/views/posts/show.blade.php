<x-layout>
    <x-slot name="title">
        <title>
            La liste des posts
        </title>
    </x-slot>
    <x-slot name="mainContent">
        <main class="mx-auto mt-10 space-y-6 max-w-6xl lg:mt-20">
            <article class="gap-x-10 mx-auto max-w-4xl lg:grid lg:grid-cols-12">
                <div class="col-span-4 mb-10 lg:text-center lg:pt-14">
                    @if(!isset($post->thumbnail_path))
                        <img src="/images/illustration-3.png" alt="thumbnail" class="rounded-xl">
                    @else
                        <img src="{{asset('storage/'.$post->thumbnail_path)}}" alt="thumbnail" class="rounded-xl">
                    @endif
                    <p class="block mt-4 text-xs text-gray-400">
                        Published
                        <time>{{$post->published_at->diffForHumans()}}</time>
                    </p>
                    <div class="flex items-center mt-4 text-sm lg:justify-center">
                        <img src="https://i.pravatar.cc/100?u={{$post->author->id}}" alt="A random picture" width="60"
                             height="60" class="rounded-xl">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                <a href="/?author={{ $post->author->username }}">{{$post->author->name}}</a>
                            </h5>
                            <h6>Mascot at Laracasts</h6>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden justify-between mb-6 lg:flex">
                        <a href="/"
                           class="inline-flex relative items-center text-lg transition-colors duration-300 hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>
                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <x-category-button :category="$post->category"/>
                        </div>
                    </div>

                    <h1 class="mb-10 text-3xl font-bold lg:text-4xl">
                        {{$post->title}}
                    </h1>

                    <div class="space-y-4 leading-loose lg:text-lg">
                        {!! $post->body !!}
                    </div>
                </div>
                <section class="col-span-8 col-start-5 mt-10 space-y-6">
                    @include('_add-comment-form')
                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
                        @foreach($post->comments as $comment)
                            <x-panel>
                                <x-post-comment :comment="$comment"/>
                            </x-panel>
                        @endforeach
                    </section>

            </article>
        </main>

    </x-slot>

</x-layout>

{{--        <h2>--}}
{{--            {{ $post->title }}--}}
{{--        </h2>--}}
{{--        <div>--}}
{{--            <p>--}}
{{--                Created by: <a href="/authors/{{$post->author->slug}}">{{$post->author->name}}</a>--}}
{{--            </p>--}}
{{--            <p>--}}
{{--                Published on:--}}
{{--                <time datetime="{{$post->published_at}}">--}}
{{--                    {{$post->published_at->diffForHumans()}}--}}
{{--                </time>--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <p>--}}
{{--            <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>--}}
{{--        </p>--}}

{{--        <p>--}}
{{--            {{ $post->body }}--}}
{{--        </p>--}}
{{--        <a href="/">⬅ Go back</a>--}}


