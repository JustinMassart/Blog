<x-layout>

    <x-slot name="title">
        <title>
            La liste des utilisateurs
        </title>
    </x-slot>

    <x-slot name="mainContent">
        <h2>
            Liste des auteurs
        </h2>
        <ul>

            @foreach ($authors as $author)
                <li>
                    <a href="/authors/{{$author->slug}}">
                        {{ $author->name }}
                    </a> - {{$author->posts->count()}}
                </li>
            @endforeach
        </ul>
        <a href="/">⬅ Go back</a>
    </x-slot>

</x-layout>

