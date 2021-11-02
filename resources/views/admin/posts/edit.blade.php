<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form action="/admin/posts/{{ $post->id }}" method="POST" x-data="{}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="title" :value="old('title', $post->title)" x-ref="newtitle" @input="$refs.slugfield.value = slugify($refs.newtitle.value,'-').toLowerCase()"/>
            <x-form.input name="slug"  :value="old('slug', $post->slug)" x-ref="slugfield"/>

            <x-form.textarea name="excerpt" rows="2">{{ old('except', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body" rows="10">{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category"/>
                <select name="category_id" id="category" class="p-2 border border-gray-400" required>
                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            value="{{$category->id}}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
                <x-error-message field="category"/>
            </x-form.field>

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)"/>
                </div>
                @if(!isset($post->thumbnail_path))
                    <img src="/images/illustration-3.png" alt="thumbnail" class="rounded-xl ml-6" width="100">
                @else
                    <img src="{{asset('storage/'.$post->thumbnail_path)}}" alt="thumbnail" class="rounded-xl ml-6"
                         width="100">
                @endif
            </div>

            <x-submit-button>Update!</x-submit-button>
        </form>
    </x-setting>
</x-layout>
