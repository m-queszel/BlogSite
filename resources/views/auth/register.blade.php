<x-layout>

    <x-forms.form method="POST" action="/register">
        <x-forms.title>Register a New Account</x-forms.title>
        <x-forms.divider/>

        <x-forms.title>Name</x-forms.title>
        <x-forms.input name="name" value="{{ old('name')  }}"></x-forms.input>

        <x-forms.title>Email</x-forms.title>
        <x-forms.input name="email" type="email" value="{{ old('email') }}"/>
        <x-forms.title>Password</x-forms.title>
        <x-forms.input name="password" type="password" value=""/>
        <x-forms.title>Confirm Password</x-forms.title>
        <x-forms.input name="password_confirmation" type="password" value=""/>

        <x-forms.divider/>

        <x-forms.submit-button>Register</x-forms.submit-button>

    </x-forms.form>
</x-layout>