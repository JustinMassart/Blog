<x-layout>
    <x-slot name="mainContent">
        <sectiosn class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10">
                <x-panel>
                    <h1 class="text-center font-bold text-xl">Login</h1>
                    <form action="/sessions" method="POST" class="mt-10">
                        @csrf
                        <x-form.input name="email" type="email" autocomplete="username" />
                        <x-form.input name="password" type="password" autocomplete="new-password" />
                        <x-submit-button>Login</x-submit-button>
                    </form>
                </x-panel>
            </main>
        </sectiosn>
    </x-slot>
</x-layout>
