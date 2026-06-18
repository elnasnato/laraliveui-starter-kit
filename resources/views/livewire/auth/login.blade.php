<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" />

        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

            <laraliveui:input name="email" :label="__('Email address')" :value="old('email')" type="email" required autofocus autocomplete="email" placeholder="email@example.com" />

            <div class="relative">
                <laraliveui:input name="password" :label="__('Password')" type="password" required autocomplete="current-password" :placeholder="__('Password')" viewable />

                @if (Route::has('password.request'))
                    <laraliveui:link class="absolute top-0 text-sm end-0" :href="route('password.request')" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </laraliveui:link>
                @endif
            </div>

            <laraliveui:checkbox name="remember" :label="__('Remember me')" :checked="old('remember')" />

            <div class="flex items-center justify-end">
                <laraliveui:button variant="primary" type="submit" class="w-full" data-test="login-button">
                    {{ __('Log in') }}
                </laraliveui:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-zinc-600 dark:text-zinc-400">
                <span>{{ __('Don\'t have an account?') }}</span>
                <laraliveui:link :href="route('register')" wire:navigate>{{ __('Sign up') }}</laraliveui:link>
            </div>
        @endif
    </div>
</x-layouts.auth>
