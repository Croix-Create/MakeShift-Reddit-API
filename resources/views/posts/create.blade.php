<style>

.inputDiv
{
    display: flex;
    flex-direction: column;
    align-items: center;
}

</style>

<x-layout>
            <form method="POST" action="/posts/store" enctype="multipart/form-data">
                @csrf

                <div class="inputDiv">

                    <div style="width: 1200px;">
                        <h1>Set the title of your post:</h1>
                        <x-form.input name="title" />
                    </div>

                    
                    <div style="width: 1400px;">
                        <h1>Time to get creative!</h1>
                        <x-form.textarea name="body" />
                    </div>
                    
                    <div>
                        <h1>Set the URI for your post</h1>
                        <x-form.input name="slug"/>
                    </div>
                    

                </div>


                </div>

                <div class="flex justify-end mt-6  pt-6 border-t border-blue-200 pt-6">
                    <button type="submit" class="bg-blue-500 text-white uppercase font-semisolid text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                        Publish
                    </button>
                </div>
            </form>
</x-layout>
