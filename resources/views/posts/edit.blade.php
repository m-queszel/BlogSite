<x-layout>
    <x-forms.form action="/posts/{{ $post->id }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
                <x-forms.title>Editing: {{ $post->title }}</x-forms.title>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-forms.input name="title" value="{{ old('title', $post->title) }}">Title</x-forms.input>
                    <x-forms.paragraph-input name="body" value="{{ old('body', $post->body) }}">Body</x-forms.paragraph-input>
                </div>
            </div>

            <div class="border-b border-white/10 pb-12">
                <fieldset>
                    <legend class="text-lg font-semibold text-white">Notifications For Your Post</legend>
                    <p class="mt-1 text-lg text-gray-400">These are delivered via email.</p>
                    <div class="mt-6 space-y-6">
                        <x-forms.radio-button id="enabled" value="1" :checked="$post->notify == 1">Enable Notifications</x-forms.radio-button>
                        <x-forms.radio-button id="disabled" value="0" :checked="$post->notify == 0">Disable Notifications</x-forms.radio-button>
                    </div>
                </fieldset>
            </div>
            <div class="flex justify-between">
                <div>
                    <x-forms.delete-button>Delete Post</x-forms.delete-button>
                </div>
                <div>
                    <x-forms.submit-button>Make Changes</x-forms.submit-button>
                </div>

            </div>
        </div>

    </x-forms.form>
    <form method="POST" id="delete-form" action="/posts/{{$post->id}} class="hidden">
        @csrf
        @method("DELETE")
    </form>
</x-layout>

