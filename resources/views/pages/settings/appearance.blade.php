<?php

use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Appearance settings')] class extends Component {
    //
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <laraliveui:heading class="sr-only">{{ __('Appearance settings') }}</laraliveui:heading>

    <x-pages::settings.layout :heading="__('Appearance')" :subheading="__('Update the appearance settings for your account')">
        <laraliveui:radio.group x-data variant="segmented" x-model="$laraliveui.appearance">
            <laraliveui:radio value="light" icon="sun">{{ __('Light') }}</laraliveui:radio>
            <laraliveui:radio value="dark" icon="moon">{{ __('Dark') }}</laraliveui:radio>
            <laraliveui:radio value="system" icon="computer-desktop">{{ __('System') }}</laraliveui:radio>
        </laraliveui:radio.group>
    </x-pages::settings.layout>
</section>
