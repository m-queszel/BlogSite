<x-layout>

    <x-forms.form method="POST" action="/login">

        <x-forms.title>Email</x-forms.title>
        <x-forms.input name="email" type="email" value="{{ old('email') }}"/>
        <x-forms.title>Password</x-forms.title>
        <x-forms.input name="password" type="password" value=""/>

        <a href="{{ route('password.request')  }}" class="text-sm hover:underline cursor-pointer"> Forgot Password? </a>

        <x-forms.divider/>

        <x-forms.submit-button>Login</x-forms.submit-button>

    </x-forms.form>

</x-layout>