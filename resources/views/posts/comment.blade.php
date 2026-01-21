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
        <div class="mt-2 ml-2 flex gap-3">
            <div>
               │<br>│<br>└──>
            </div>
            <x-forms.form class="w-full" method="POST" action="{{ route('comment.store', $post->id)  }}">
                <x-forms.paragraph-input name="body" value=""/>
                <input name="post_id" value="{{ $post->id }}" class="hidden" />
                <input name="user_id" value="{{ Auth::user()->id }}" class="hidden" />
                <x-forms.submit-button :hasCancel="true" :isComment="true" post="{{ $post->id }}">Post</x-forms.submit-button>
            </x-forms.form>
        </div>

        <div>
            <h1 class='text-2xl'>Comments</h1>
            @foreach ($post->comments as $comment)
            <div class="mt-5 ml-2 flex gap-3">
                <div>
                    │<br>│<br>└──>
                </div>
                <div class="flex border rounded-xl flex-col p-2 w-full mt-5 hover:border-orange-500">
                        <h4>{{ $comment->user?->name  }}</h4>
                        <p>{{ $comment->body  }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>