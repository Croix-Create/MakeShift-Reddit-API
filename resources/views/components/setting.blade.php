@props(['heading'])

<section class="px-6 py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-6 pb-6 border-b border-blue-200">
        {{$heading}}
    </h1>
    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <ul>
                <li class="pb-6">
                    <a href="/posts" class="{{ request()->is('/posts') ? 'text-blue-500' : '' }}">All Posts</a>
                </li>
                <li>
                    <a href="posts/create" class="{{ request()->is('posts/create') ? 'text-blue-500' : '' }}">New Post</a>
                </li>
            </ul>
        </aside>
        <main class="flex-1 max-w-4xl">
            <x-panel class="mx-auto">
                {{$slot}}
            </x-panel>
        </main>
    </div>
</section>
