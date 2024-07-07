<style>

.inputDiv
{
    display: flex;
    flex-direction: column;
    align-items: center;
}

</style>

<x-layout>
            <form method="POST" action="/store" enctype="multipart/form-data">
                @csrf

                <div class="inputDiv">

                    <div>
                        <h1>Set your username:</h1>
                        <x-form.input name="username" />
                    </div>

                    
                    <div>
                        <h1>What's your email?</h1>
                        <x-form.textarea name="email" />
                    </div>
                    
                    <div>
                        <h1>Set your password!</h1>
                        <x-form.input name="password"/>
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

