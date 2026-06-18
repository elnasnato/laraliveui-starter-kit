<?php

use App\Concerns\PasswordValidationRules;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

new class extends Component {
    use PasswordValidationRules;

    public string $password = '';

    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => $this->currentPasswordRules(),
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <laraliveui:heading>{{ __('Delete account') }}</laraliveui:heading>
        <laraliveui:subheading>{{ __('Delete your account and all of its resources') }}</laraliveui:subheading>
    </div>

    <laraliveui:modal.trigger name="confirm-user-deletion">
        <laraliveui:button variant="danger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" data-test="delete-user-button">
            {{ __('Delete account') }}
        </laraliveui:button>
    </laraliveui:modal.trigger>

    <laraliveui:modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable class="max-w-lg">
        <form method="POST" wire:submit="deleteUser" class="space-y-6">
            <div>
                <laraliveui:heading size="lg">{{ __('Are you sure you want to delete your account?') }}</laraliveui:heading>

                <laraliveui:subheading>
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </laraliveui:subheading>
            </div>

            <laraliveui:input wire:model="password" :label="__('Password')" type="password" />

            <div class="flex justify-end space-x-2 rtl:space-x-reverse">
                <laraliveui:modal.close>
                    <laraliveui:button variant="filled">{{ __('Cancel') }}</laraliveui:button>
                </laraliveui:modal.close>

                <laraliveui:button variant="danger" type="submit" data-test="confirm-delete-user-button">
                    {{ __('Delete account') }}
                </laraliveui:button>
            </div>
        </form>
    </laraliveui:modal>
</section>
