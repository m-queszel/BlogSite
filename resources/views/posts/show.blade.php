<x-layout>
    <div class="px-25">
        <div href="/posts/{{ $post['id'] }}" class="flex border rounded-xl flex-col p-2 w-full hover:border-orange-500">
            <div class="border-b">
                <h2 class="text-4xl">{{ $post->title  }}</h2>
                <p class="text-lg">By: {{ $post->author->name  }}</p>
            </div>
            <h2 class="text-lg">{{ $post->body  }}</h2>

            <div class="justify-self-start">
                @foreach ($post->tags as $tag)
                    <x-tag :$tag/>
                @endforeach
            </div>

        </div>
        <div class="flex justify-between">
            @can('create', $comment)
                <x-forms.comment-button :$post>Add Comment</x-forms.comment-button>
            @endcan
            @can('update', $post)
                <x-forms.edit-button :$post>Edit</x-forms.edit-button>
            @endcan
        </div>
        <x-forms.divider/>
        <div>
            <h1 class='text-2xl'>Comments</h1>
            @foreach ($post->comments as $comment)
            <div class="mt-5 ml-2 flex gap-3">
                <div>
                    │<br>│<br>└──>
                </div>
                <div class="flex border rounded-xl flex-col p-2 w-full mt-5 hover:border-orange-500">
                        <h4>{{ $comment->user?->name }}</h4>
                        <p>{{ $comment->body  }}</p>
                        @can('delete', $comment)
                            <div class="flex justify-end">
                                <button 
                                form="delete-form"
                                class="bg-red-500 hover:bg-red-600 rounded-2xl px-3 py-1 cursor-pointer"
                                :$post
                                >Delete<button>
                            </div>
                        @endcan
                </div>
            </div>
            <form method="POST" id="delete-form" action="/comment/{{ $comment->id }} class="hidden">
                @csrf
                @method("DELETE")
            </form>
            @endforeach
        </div>
    </div>
</x-layout>