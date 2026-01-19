<x-layout>
    <div class="mb-4 text-lg text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-forms.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <div class="flex items-center justify-start mt-4">
            <x-forms.submit-button>
                {{ __('Reset Password') }}
            </x-forms.submit-button>
        </div>
    </form>
</x-layout>
