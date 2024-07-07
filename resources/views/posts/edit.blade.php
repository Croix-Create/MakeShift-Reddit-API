<x-layout>
        <x-setting :heading=" 'Edit Post: ' . $post->title ">
            <form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.input name="title" :value="$post->title" />

                <x-form.textarea name="body"> {{ old('body', $post->body) }} </x-form.textarea>

                <x-form.input name="slug" :value="$post->slug"/>

                <div class="flex justify-end mt-6  pt-6 border-t border-blue-200 pt-6">
                    <button type="submit" class="bg-blue-500 text-white uppercase font-semisolid text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                        Update
                    </button>
                </div>
            </form>
        </x-setting>

        <x-setting :heading=" 'Edit Post: ' . $post->title ">
            <form method="POST" action="posts/{{ $post->id }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.input name="title" :value="$post->title" />

                <x-form.textarea name="body"> {{ old('body', $post->body) }} </x-form.textarea>

                <x-form.input name="slug" :value="$post->slug"/>

                </div>

                <div class="flex justify-end mt-6  pt-6 border-t border-blue-200 pt-6">
                    <button type="submit" class="bg-blue-500 text-white uppercase font-semisolid text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                        Update
                    </button>
                </div>
            </form>
        </x-setting>
</x-layout>
