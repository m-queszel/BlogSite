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

            <div class="border-b border-white/10 pb-12">
                <fieldset>
                    <legend class="text-lg font-semibold text-white">Notifications For Your Post</legend>
                    <p class="mt-1 text-lg text-gray-400">These are delivered via email.</p>
                    <div class="mt-6 space-y-6">
                        <x-forms.radio-button id="enabled" value=1>Enable Notifications</x-forms.radio-button>
                        <x-forms.radio-button id="disabled">Disable Notifications</x-forms.radio-button>
                    </div>
                </fieldset>
            </div>
            <x-forms.submit-button>Create Post</x-forms.submit-button>
        </div>

    </x-forms.form>
</x-layout>
