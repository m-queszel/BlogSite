<x-layout>
    <div class="flex justify-center">
        <div class="flex flex-col max-w-150">
            <h2 class="text-2xl text-center">Email Verification</h2>
            <x-forms.divider/>
            <p>Please check your inbox for the verification link. If you do not see the email, click the
                resend button below.</p>
            <x-forms.form :action="route('verification.send')" method="POST">
                <div class="mt-4 flex justify-center">
                    <x-forms.submit-button :hasCancel="false">Resend</x-forms.submit-button>
                </div>
            </x-forms.form>
        </div>
    </div>
</x-layout>