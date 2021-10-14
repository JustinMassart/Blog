<x-layout>

    <x-slot name="title">
        <title>
            La liste des utilisateurs
        </title>
    </x-slot>

    <x-slot name="mainContent">
        <h2>
            {{ $author->name }}
        </h2>
        @forelse($author->posts as $post)
            <article>
                <h3>
                    <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
                </h3>
                <p>
                    Created by: <b>{{$author->name}}</b>
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
                    {{$post->category->name}}
                </p>

            </article>
            <p>---------</p>
        @empty
            <p>{{$author->name}} n'a pas encore écrit de post</p>
        @endforelse
        <a href="/authors">⬅ Go back</a>
    </x-slot>

</x-layout>

