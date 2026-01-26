<x-layout>
    <div class="mb-4">
        <form method="GET" action="/" class="flex items-center">
            <label for="category" class="mr-2">Filter by Category:</label>
            <select name="category" id="category" class="border-gray-300 rounded-md shadow-sm focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50">
                <option value="">All</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="ml-6 px-2 py-1 bg-orange-500 rounded-md cursor-pointer hover:bg-orange-600">Filter</button>
        </form>
    </div>
    <div class="grid grid-cols-3 gap-4">
    @foreach ($posts as $post)
            <x-blogcard :$post/>
    @endforeach
    </div>

    <div class="px-4 py-6">
        {{ $posts->links() }}
    </div>

</x-layout>
