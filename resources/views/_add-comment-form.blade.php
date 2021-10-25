@auth
    <x-panel>
        <form action="/posts/{{$post->slug}}/comments" method="POST">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/100?u={{auth()->id()}}" alt="My pic" width="40"
                     height="40" class="rounded-xl">
            </header>
            <div class="mt-5">
                            <textarea name="body" id="body" class="w-full border border-gray-200" rows="10" cols="30"
                                      placeholder="Enter your comment here !" value="{{ old('body') }}"></textarea>
            </div>
            @error('body')
            <p class="text-sm text-red-500">A text is required to post a comment</p>
            @enderror
            <div class="flex justify-end mt-5">
                <x-submit-button>Post it!</x-submit-button>
            </div>
        </form>
    </x-panel>
    </section>
@else
    <h3 class="font-bold text-blue-500">
        <a href="/login"
           class="hover:text-blue-800">
            Want to publish your own ? Log into your account !
        </a>
    </h3>
@endauth
