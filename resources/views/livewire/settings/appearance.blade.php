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
        <div
            x-data
            class="flex gap-1 rounded-lg bg-zinc-800/5 p-1 dark:bg-white/10"
            role="radiogroup"
        >
            <button
                type="button"
                role="radio"
                aria-checked="false"
                x-bind:aria-checked="$laraliveui.appearance === 'light'"
                x-on:click="$laraliveui.appearance = 'light'; window.LaraLiveUI.applyAppearance('light')"
                class="flex flex-1 items-center justify-center gap-2 whitespace-nowrap rounded-md px-4 py-2 text-sm font-medium transition-colors"
                x-bind:class="$laraliveui.appearance === 'light'
                    ? 'bg-white text-zinc-800 shadow-xs dark:bg-white/20 dark:text-white'
                    : 'text-zinc-600 hover:text-zinc-800 dark:text-white/70 dark:hover:text-white'"
            >
                <laraliveui:icon icon="sun" variant="mini" class="size-4 shrink-0" />
                {{ __('Light') }}
            </button>
            <button
                type="button"
                role="radio"
                aria-checked="false"
                x-bind:aria-checked="$laraliveui.appearance === 'dark'"
                x-on:click="$laraliveui.appearance = 'dark'; window.LaraLiveUI.applyAppearance('dark')"
                class="flex flex-1 items-center justify-center gap-2 whitespace-nowrap rounded-md px-4 py-2 text-sm font-medium transition-colors"
                x-bind:class="$laraliveui.appearance === 'dark'
                    ? 'bg-white text-zinc-800 shadow-xs dark:bg-white/20 dark:text-white'
                    : 'text-zinc-600 hover:text-zinc-800 dark:text-white/70 dark:hover:text-white'"
            >
                <laraliveui:icon icon="moon" variant="mini" class="size-4 shrink-0" />
                {{ __('Dark') }}
            </button>
            <button
                type="button"
                role="radio"
                aria-checked="false"
                x-bind:aria-checked="$laraliveui.appearance === 'system'"
                x-on:click="$laraliveui.appearance = 'system'; window.LaraLiveUI.applyAppearance('system')"
                class="flex flex-1 items-center justify-center gap-2 whitespace-nowrap rounded-md px-4 py-2 text-sm font-medium transition-colors"
                x-bind:class="$laraliveui.appearance === 'system'
                    ? 'bg-white text-zinc-800 shadow-xs dark:bg-white/20 dark:text-white'
                    : 'text-zinc-600 hover:text-zinc-800 dark:text-white/70 dark:hover:text-white'"
            >
                <laraliveui:icon icon="computer-desktop" variant="mini" class="size-4 shrink-0" />
                {{ __('System') }}
            </button>
        </div>
    </x-settings.layout>
</section>
