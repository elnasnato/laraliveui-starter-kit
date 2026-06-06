<?php

use Livewire\Component;

new class extends Component {}; ?>

<section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <laraliveui:heading>{{ __('Delete account') }}</laraliveui:heading>
        <laraliveui:subheading>{{ __('Delete your account and all of its resources') }}</laraliveui:subheading>
    </div>

    <laraliveui:modal.trigger name="confirm-user-deletion">
        <laraliveui:button variant="danger" data-test="delete-user-button">
            {{ __('Delete account') }}
        </laraliveui:button>
    </laraliveui:modal.trigger>

    <livewire:pages::settings.delete-user-modal />
</section>
