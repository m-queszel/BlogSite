<x-layout>
    <x-forms.form action="/posts" method="POST">
        <div class="space-y-12">

            <div class="border-b border-white/10 pb-12">
                <x-forms.title>Post Creation:</x-forms.title>
                <p class="mt-1 text-lg text-gray-400">This information will be displayed publicly so be careful what you share.</p>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-forms.input name="title" value="">Title</x-forms.input>
                    <x-forms.paragraph-input name="body" value="">Body</x-forms.paragraph-input>
                </div>
            </div>

            <div class="border-b border-white/10 pb-12 flex justify-between">
                <div>
                    <fieldset>
                        <legend class="text-lg font-semibold text-white">Notifications For Your Post</legend>
                        <p class="mt-1 text-lg text-gray-400">These are delivered via email.</p>
                        <div class="mt-6 space-y-6">
                            <x-forms.radio-button id="enabled" value=1>Enable Notifications</x-forms.radio-button>
                            <x-forms.radio-button id="disabled" value=0 checked>Disable Notifications</x-forms.radio-button>
                        </div>
                    </fieldset>
                </div>
                <div>
                    <label for="category" class="block text-lg font-semibold text-white">Category</label>
                    <select id="category" name="category_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm rounded-md bg-white/5 text-white">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <fieldset class="mt-3">
                        <legend class="block text-lg font-semibold mb-3">Select Tags</legend>
                        <div class="space-y-2">
                            @foreach ($tags as $tag)
                                <div class="flex items-center">
                                    <input
                                        id="tag_{{ $tag->id }}"
                                        name="tag_id[]"
                                        type="checkbox"
                                        value="{{ $tag->id }}"
                                        class="h-4 w-4 rounded border-gray-300 text-orange-500 focus:ring-orange-500 bg-white/5"
                                    />
                                    <label for="tag_{{ $tag->id }}" class="ml-3 text-sm">{{$tag->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>

                </div>
            </div>
            <x-forms.submit-button>Create Post</x-forms.submit-button>
        </div>

    </x-forms.form>
</x-layout>
