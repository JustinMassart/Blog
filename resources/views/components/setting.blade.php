@props(['heading'])
<x-slot name="mainContent">
    <section class="py-8 mx-auto max-w-4xl">
        <h1 class="mb-8 pb-2 text-lg font-bold border-b">{{ $heading }}</h1>
        <div class="flex">
            <aside class="w-48 flex-shrink-0">
                <h4 class="font-semibold mb-4"></h4>
                <ul>
                    <li>
                        <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All Posts</a>
                    </li>
                    <li>
                        <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
                    </li>
                </ul>
            </aside>
            <main class="flex-1">
                <x-panel>
                    {{ $slot }}
                </x-panel>
            </main>
        </div>
    </section>
</x-slot>
