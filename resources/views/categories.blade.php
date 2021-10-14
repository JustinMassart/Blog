<x-layout>

    <x-slot name="title">
        <title>
            La liste des catégories
        </title>
    </x-slot>

    <x-slot name="mainContent">
        @include('_posts-header')
        <main>
            <ul>
                @foreach ($categories as $category)
                    <li>
                        <a href="/categories/{{$category->slug}}">
                            {{ $category->name }}
                        </a> - {{$category->posts->count()}}
                    </li>
                @endforeach
            </ul>
        </main>
    </x-slot>

</x-layout>
