<x-layout>
            <form method="POST" action="/posts/create" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title" />

                <x-form.textarea name="body" />

                <x-form.input name="slug"/>

                    @error('category')
                    <p class="text-red-500 text-xs mt-2"> {{$message}}</p>
                    @enderror
                </div>

                <div class="flex justify-end mt-6  pt-6 border-t border-blue-200 pt-6">
                    <button type="submit" class="bg-blue-500 text-white uppercase font-semisolid text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                        Publish
                    </button>
                </div>
            </form>
</x-layout>
