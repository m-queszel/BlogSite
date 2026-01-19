@props(['post'])

<div class="flex border rounded-xl flex-col p-2 w-full hover:border-orange-500">
    <a href="/posts/{{ $post['id'] }}">
        <div class="border-b">
            <h2 class="text-4xl">{{ $post->title  }}</h2>
            <p class="text-lg">By: {{ $post->author->name  }}</p>
        </div>
        <h2 class="text-lg">{{ $post->body  }}</h2>
    </a>
    <div class="flex-row mt-2">
        @foreach ($post->tags as $tag)
            <x-tag :$tag/>
        @endforeach
    </div>
</div>