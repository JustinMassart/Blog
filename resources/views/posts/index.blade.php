<x-layout>

    <x-slot name="title">
        <title>
            La liste des posts
        </title>
    </x-slot>

    <x-slot name="mainContent">
        @include('_posts-header')
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if($posts->count())
                <x-post-featured-card :post="$posts->first()"/>
                <x-posts-grid :posts="$posts" />
                {{ $posts->links() }}

            @else

                There are not any posts yet !

            @endif
        </main>

    </x-slot>

</x-layout>


{{--
<h1>Hello World</h1>
        @foreach ($posts as $post)
            <article>
                <h2>
                    <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
                </h2>

                <p>
                    Created by: <b>{{$post->author->name}}</b>
                </p>

                <p>
                    Published on:
                    <time datetime="{{$post->published_at}}">
                        {{$post->published_at->diffForHumans()}}
                    </time>
                </p>

                <p>
                    {{$post->excerpt}}
                </p>

                <p>
                    <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
                </p>
            </article>
        @endforeach
--}}
