<x-layout>
    <x-forms.form>
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
                <h2 class="text-2xl font-semibold text-white">Post Creation:</h2>
                <p class="mt-1 text-lg text-gray-400">This information will be displayed publicly so be careful what you share.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="username" class="block text-lg text-white">Title</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-orange-500">
                                <input id="title" type="text" name="title" class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-lg text-white  focus:outline-none" />
                            </div>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="about" class="block text-lg text-white">Body</label>
                        <div class="mt-2">
                            <textarea id="about" name="about" rows="3" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-lg text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-orange-500"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-b border-white/10 pb-12">
                <fieldset>
                    <legend class="text-lg font-semibold text-white">Notifications For Your Post</legend>
                    <p class="mt-1 text-lg text-gray-400">These are delivered via email.</p>
                    <div class="mt-6 space-y-6">
                        <x-forms.radio-button id="push-everything">Enable Notifications</x-forms.radio-button>
                        <x-forms.radio-button id="push-nothing">Disable Notifications</x-forms.radio-button>
                    </div>
                </fieldset>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-lg/6 font-semibold text-white hover:text-orange-500">Cancel</a>
            <x-forms.submit-button/>
        </div>
    </x-forms.form>
</x-layout>
