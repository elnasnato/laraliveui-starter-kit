<x-layouts.auth>
    <div class="mt-4 flex flex-col gap-6">
        <laraliveui:text class="text-center">
            {{ __('Please verify your email address by clicking on the link we just emailed to you.') }}
        </laraliveui:text>

        @if (session('status') == 'verification-link-sent')
            <laraliveui:text class="text-center font-medium !dark:text-green-400 !text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </laraliveui:text>
        @endif

        <div class="flex flex-col items-center justify-between space-y-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <laraliveui:button type="submit" variant="primary" class="w-full">
                    {{ __('Resend verification email') }}
                </laraliveui:button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <laraliveui:button variant="ghost" type="submit" class="text-sm cursor-pointer" data-test="logout-button">
                    {{ __('Log out') }}
                </laraliveui:button>
            </form>
        </div>
    </div>
</x-layouts.auth>
