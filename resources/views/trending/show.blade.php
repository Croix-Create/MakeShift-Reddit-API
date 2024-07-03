<x-layout>

    <section class="px-6 py-8">

        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                @foreach ($posts as $post)


                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>
                    </div>

                    <ul> 
                        <li>
                        <h1 class="font-bold text-3xl lg:text-4xl mb-10 text-blue-600">
                            {!! $post->title !!}
                        </h1>

                        <div>
                            <a href="{!! $post->url !!}"><img src="{!! $post->url !!}"></a>
                        </div>
                        <div>
                            {!! $post->score !!}
                        </div>
                        </li>
                        @endforeach
                    </ul>


                </div>
            <section class="col-span-8 col-start-5 mt-10 space-y-5">

                <x-panel>
                    <form method="POST" action="/posts/{{ $post->slug }}/comments">
                        @csrf


                        <div class="mt-3">
                            <textarea name="body"
                                      class="w-full focus:outline-none focus:ring text-sm"
                                      id=""
                                      rows="5"
                                      placeholder="Quick, think of something to say!" required></textarea>
                            @error('body')
                                <span class="text-xs text-red-200">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="flex justify-end mt-6  pt-6 border-t border-blue-200 pt-6">
                            <button type="submit" class="bg-blue-500 text-white uppercase font-semisolid text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                                Post
                            </button>
                        </div>

                    </form>
                </x-panel>



                    @foreach ($post->comments as $comment)
                        <x-post-comment
                            :comment="$comment">
                        </x-post-comment>
                    @endforeach
                </section>
            </article>
        </main>
    </section>
</x-layout>
