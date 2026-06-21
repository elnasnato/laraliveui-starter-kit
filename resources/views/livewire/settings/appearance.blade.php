<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('components.layouts.app')] class extends Component {
    //
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <laraliveui:heading class="sr-only">{{ __('Appearance Settings') }}</laraliveui:heading>

    <x-settings.layout :heading="__('Appearance')" :subheading="__('Update the appearance settings for your account')">
        <laraliveui:radio.group variant="pills" x-model="$laraliveui.appearance">
            <laraliveui:radio.pills value="light">
                <laraliveui:icon icon="sun" variant="mini" class="size-4 shrink-0" />
                {{ __('Light') }}
            </laraliveui:radio.pills>
            <laraliveui:radio.pills value="dark">
                <laraliveui:icon icon="moon" variant="mini" class="size-4 shrink-0" />
                {{ __('Dark') }}
            </laraliveui:radio.pills>
            <laraliveui:radio.pills value="system">
                <laraliveui:icon icon="computer-desktop" variant="mini" class="size-4 shrink-0" />
                {{ __('System') }}
            </laraliveui:radio.pills>
        </laraliveui:radio.group>
    </x-settings.layout>
</section>
