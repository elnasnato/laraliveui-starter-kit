<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <laraliveui:sidebar sticky collapsible="mobile" class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <laraliveui:sidebar.header>
                <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
                <laraliveui:sidebar.collapse class="lg:hidden" />
            </laraliveui:sidebar.header>

            <laraliveui:sidebar.nav>
                <laraliveui:sidebar.group :heading="__('Platform')" class="grid">
                    <laraliveui:sidebar.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </laraliveui:sidebar.item>
                </laraliveui:sidebar.group>
            </laraliveui:sidebar.nav>

            <laraliveui:spacer />

            <laraliveui:sidebar.nav>
                <laraliveui:sidebar.item icon="folder-open" href="https://github.com/elnasnato/laraliveui-starter-kit" target="_blank">
                    {{ __('Repository') }}
                </laraliveui:sidebar.item>

                <laraliveui:sidebar.item icon="book-open" href="https://elnasnato.github.io/laraliveui-docs/" target="_blank">
                    {{ __('Documentation') }}
                </laraliveui:sidebar.item>
            </laraliveui:sidebar.nav>

            <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
        </laraliveui:sidebar>

        <!-- Mobile User Menu -->
        <laraliveui:header class="lg:hidden">
            <laraliveui:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <laraliveui:spacer />

            <laraliveui:dropdown position="top" align="end">
                <laraliveui:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <laraliveui:menu>
                    <laraliveui:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <laraliveui:avatar
                                    :name="auth()->user()->name"
                                    :initials="auth()->user()->initials()"
                                />

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <laraliveui:heading class="truncate">{{ auth()->user()->name }}</laraliveui:heading>
                                    <laraliveui:text class="truncate">{{ auth()->user()->email }}</laraliveui:text>
                                </div>
                            </div>
                        </div>
                    </laraliveui:menu.radio.group>

                    <laraliveui:menu.separator />

                    <laraliveui:menu.radio.group>
                        <laraliveui:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                            {{ __('Settings') }}
                        </laraliveui:menu.item>
                    </laraliveui:menu.radio.group>

                    <laraliveui:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <laraliveui:menu.item
                            as="button"
                            type="submit"
                            icon="arrow-right-start-on-rectangle"
                            class="w-full cursor-pointer"
                            data-test="logout-button"
                        >
                            {{ __('Log out') }}
                        </laraliveui:menu.item>
                    </form>
                </laraliveui:menu>
            </laraliveui:dropdown>
        </laraliveui:header>

        {{ $slot }}

        @persist('toast')
            <laraliveui:toast.group>
                <laraliveui:toast />
            </laraliveui:toast.group>
        @endpersist

        @laraliveuiScripts
    </body>
</html>
