<x-layout>
    <div class="px-25">
        <div href="/posts/{{ $post['id'] }}" class="flex border rounded-xl flex-col p-2 w-full hover:border-orange-500">
            <div class="border-b">
                <h2 class="text-4xl">{{ $post->title  }}</h2>
                <p class="text-lg">By: {{ $post->author->name  }}</p>
            </div>
            <h2 class="text-lg">{{ $post->body  }}</h2>
        </div>
        @can('update', $post)
            <x-forms.edit-button :$post>Edit</x-forms.edit-button>           
        @endcan

    </div>
</x-layout>