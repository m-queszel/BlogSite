<x-layout>
    <div class="grid grid-cols-3 gap-4">
    @foreach ($posts as $post)
            <x-blogcard :$post/>
    @endforeach
    </div>
</x-layout>