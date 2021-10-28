<x-layout>
    <section class="px-6 py-8">
        <x-slot name="mainContent">
            <div class="p-6 mx-auto mt-10 max-w-lg bg-gray-100 rounded-xl border border-gray-200">
                <h1 class="font-bold text-xl">Publish a new post !</h1>
                <form action="/admin/posts" method="POST" class="mt-10" x-data="{}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                               for="title">Title</label>
                        <input class="p-2 w-full border border-gray-400" type="text" id="title" name="title"
                               value="{{ old('title') }}" x-ref="newtitle"
                               @input="$refs.slugfield.value = slugify($refs.newtitle.value,'-').toLowerCase()" required>
                        <x-error-message field="title"/>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                               for="slug">Slug</label>
                        <input class="p-2 w-full border border-gray-400" type="text" id="slug" name="slug"
                               value="{{ old('slug') }}" x-ref="slugfield" required>
                        <x-error-message field="slug"/>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                               for="excerpt">Excerpt</label>
                        <textarea name="excerpt" id="excerpt" cols="30" rows="2"
                                  class="p-2 w-full border border-gray-400" required>

                        </textarea>
                        <x-error-message field="excerpt"/>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                               for="body">Body</label>
                        <textarea name="body" id="body" cols="30" rows="10"
                                  class="p-2 w-full border border-gray-400" required></textarea>
                        <x-error-message field="body"/>
                    </div>
                    <div>
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="p-2 mb-6 border border-gray-400" required>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <x-error-message field="category"/>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                               for="thumbnail">Thumbnail</label>
                        <input class="p-2 w-full border border-gray-400" type="file" id="thumbnail" name="thumbnail">
                        <x-error-message field="thumbnail"/>
                    </div>
                    <x-submit-button>Publish it!</x-submit-button>
                </form>
            </div>
        </x-slot>
    </section>
</x-layout>
