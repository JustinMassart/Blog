<x-layout>
    <x-setting heading="Publish a new post !">
        <form action="/admin/posts" method="POST" x-data="{}" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title"/>
            <x-form.input name="slug"/>

            <x-form.textarea name="excerpt" rows="2"/>
            <x-form.textarea name="body" rows="10"/>

            <x-form.field>
                <x-form.label name="category"/>
                <select name="category_id" id="category" class="p-2 border border-gray-400" required>
                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            value="{{$category->id}}" {{ old('category-id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
                <x-error-message field="category"/>
            </x-form.field>

            <x-form.input name="thumbnail" type="file"/>

            <x-submit-button>Publish it!</x-submit-button>
        </form>
    </x-setting>
</x-layout>
