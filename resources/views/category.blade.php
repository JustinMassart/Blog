<x-layout>

    <x-slot name="title">
        <title>
            La liste des posts
        </title>
    </x-slot>

    <x-slot name="mainContent">
        @include('_posts-header')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if($category->posts->count())
                <x-post-featured-card :post="$category->posts->first()"/>
                <x-posts-grid :posts="$category->posts"/>
            @endif
        </main>
    </x-slot>

</x-layout>
