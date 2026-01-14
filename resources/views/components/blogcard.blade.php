@props(['title', 'author', 'body'])

<div class="grid grid-cols-3 gap-4">
    <div class="flex border rounded-xl flex-col p-2 w-full hover:border-orange-500">
        <div class="border-b">
            <h2 class="text-4xl">{{ $title  }}</h2>
            <p class="text-lg">By: {{ $author  }}</p>
        </div>
        <h2 class="text-lg">{{ $body  }}</h2>
    </div>
</div>