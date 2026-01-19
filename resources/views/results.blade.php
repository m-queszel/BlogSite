@props(['posts'])
<x-layout>
    <div class="grid grid-cols-3 gap-4">
    @foreach ($posts as $post)
            <x-blogcard :$post/>
    @endforeach
    </div>
    <div class="px-4 py-6">
        {{ $posts->links() }}
    </div>
</x-layout>
