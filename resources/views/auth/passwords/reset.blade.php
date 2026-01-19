<x-layout>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <!-- Email Address -->
        <div class="hidden">
            <x-input-label for="email" :value="__('Email')" />
            <x-forms.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', request()->email)" required autofocus autocomplete="username" />

        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-forms.input id="password" value="" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-forms.input value="" id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-forms.submit-button :hasCancel="false">
                {{ __('Reset Password') }}
            </x-forms.submit-button>
        </div>
    </form>
</x-layout>