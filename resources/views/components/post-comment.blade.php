 @props(['comment'])
<x-panel class="bg-blue-200">
    <article class="flex space-x-4">

            <div>
                <header class="mb-4">
                    <h3 class="font-bold">{{ $comment->author->username }}</h3>
                    <p class="text-xs">Posted <time>{{ $comment->created_at->diffForHumans() }}</time></p>
                </header>
                <p>
                    {{ $comment->body }}
                </p>
            </div>



            <div class="vote">
            <a href="{{ route('votes.create', ['id' => $commentId, 'votable_type' => 'App\Models\Comment']) }}">See Comment Votes</a>
            <p>Upvotes: {{ $votesResponse->total_upvotes }}</p>
            <p>Downvotes: {{ $votesResponse->total_downvotes }}</p>

            <x-panel>
                    <form method="POST" action="/comment/{{ $comment->slug }}/comments">
                        @csrf

                        <header class="flex items-center">
                                 width="60"
                                 length="60"
                                 class="rounded-full p-4">
                            <h2 class="ml-3">You have comment on comment?</h2>
                        </header>

                        <div class="mt-3">
                            <textarea name="body"
                                      class="w-full focus:outline-none focus:ring text-sm"
                                      id=""
                                      rows="5"
                                      placeholder="Say anythang!" required></textarea>
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

        </div>
            </div>
        </article>
</x-panel>
