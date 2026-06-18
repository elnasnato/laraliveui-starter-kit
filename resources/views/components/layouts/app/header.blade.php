<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <laraliveui:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <laraliveui:sidebar.toggle class="lg:hidden mr-2" icon="bars-2" inset="left" />

            <x-app-logo href="{{ route('dashboard') }}" wire:navigate />

            <laraliveui:navbar class="-mb-px max-lg:hidden">
                <laraliveui:navbar.item icon="layout-grid" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                </laraliveui:navbar.item>
            </laraliveui:navbar>

            <laraliveui:spacer />

            <laraliveui:navbar class="me-1.5 space-x-0.5 rtl:space-x-reverse py-0!">
                <laraliveui:tooltip :content="__('Search')" position="bottom">
                    <laraliveui:navbar.item class="!h-10 [&>div>svg]:size-5" icon="magnifying-glass" href="#" :label="__('Search')" />
                </laraliveui:tooltip>
                <laraliveui:tooltip :content="__('Repository')" position="bottom">
                    <laraliveui:navbar.item class="h-10 max-lg:hidden [&>div>svg]:size-5" icon="folder-git-2" href="https://github.com/elnasnato/laraliveui-starter-kit" target="_blank" :label="__('Repository')" />
                </laraliveui:tooltip>
                <laraliveui:tooltip :content="__('Documentation')" position="bottom">
                    <laraliveui:navbar.item class="h-10 max-lg:hidden [&>div>svg]:size-5" icon="book-open-text" href="https://elnasnato.github.io/laraliveui-docs" target="_blank" label="Documentation" />
                </laraliveui:tooltip>
            </laraliveui:navbar>

            <x-desktop-user-menu />
        </laraliveui:header>

        <!-- Mobile Menu -->
        <laraliveui:sidebar collapsible="mobile" sticky class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <laraliveui:sidebar.header>
                <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
                <laraliveui:sidebar.collapse class="in-data-laraliveui-sidebar-on-desktop:not-in-data-laraliveui-sidebar-collapsed-desktop:-mr-2" />
            </laraliveui:sidebar.header>
            <laraliveui:sidebar.nav>
                <laraliveui:sidebar.group :heading="__('Platform')">
                    <laraliveui:sidebar.item icon="layout-grid" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard')  }}
                    </laraliveui:sidebar.item>
                </laraliveui:sidebar.group>
            </laraliveui:sidebar.nav>
            <laraliveui:spacer />
            <laraliveui:sidebar.nav>
                <laraliveui:sidebar.item icon="folder-git-2" href="https://github.com/elnasnato/laraliveui-starter-kit" target="_blank">
                    {{ __('Repository') }}
                </laraliveui:sidebar.item>
                <laraliveui:sidebar.item icon="book-open-text" href="https://elnasnato.github.io/laraliveui-docs" target="_blank">
                    {{ __('Documentation') }}
                </laraliveui:sidebar.item>
            </laraliveui:sidebar.nav>
        </laraliveui:sidebar>

        {{ $slot }}

        @laraliveuiScripts
    </body>
</html>
