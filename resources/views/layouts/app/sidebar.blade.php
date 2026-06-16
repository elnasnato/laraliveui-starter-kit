<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800 antialiased">
        <laraliveui:sidebar sticky collapsible class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
            <laraliveui:sidebar.header>
                <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
                <laraliveui:sidebar.collapse />
            </laraliveui:sidebar.header>

            <laraliveui:sidebar.search placeholder="{{ __('Search...') }}" />

            <laraliveui:sidebar.nav>
                <laraliveui:sidebar.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                </laraliveui:sidebar.item>
            </laraliveui:sidebar.nav>

            <laraliveui:sidebar.spacer />

            <laraliveui:sidebar.nav>
                <laraliveui:sidebar.item icon="folder-open" href="https://github.com/elnasnato/laraliveui-starter-kit" target="_blank">
                    {{ __('Repository') }}
                </laraliveui:sidebar.item>
                <laraliveui:sidebar.item icon="book-open" href="https://elnasnato.github.io/laraliveui-docs/" target="_blank">
                    {{ __('Documentation') }}
                </laraliveui:sidebar.item>
            </laraliveui:sidebar.nav>

            <laraliveui:dropdown position="top" align="start" class="max-lg:hidden">
                <laraliveui:sidebar.profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevron-up-down"
                />

                <laraliveui:menu>
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
        </laraliveui:sidebar>

        <laraliveui:header class="block! bg-white lg:bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
            <laraliveui:navbar class="lg:hidden w-full">
                <laraliveui:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
                <laraliveui:spacer />
                <laraliveui:dropdown position="top" align="start">
                    <laraliveui:profile
                        :initials="auth()->user()->initials()"
                        icon-trailing="chevron-down"
                    />
                    <laraliveui:menu>
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
                            >
                                {{ __('Log out') }}
                            </laraliveui:menu.item>
                        </form>
                    </laraliveui:menu>
                </laraliveui:dropdown>
            </laraliveui:navbar>

            <laraliveui:navbar scrollable>
                <laraliveui:navbar.item :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                </laraliveui:navbar.item>
                <laraliveui:navbar.item icon="cog" :href="route('profile.edit')" wire:navigate class="lg:hidden">
                    {{ __('Settings') }}
                </laraliveui:navbar.item>
            </laraliveui:navbar>
        </laraliveui:header>

        <laraliveui:main>
            {{ $slot }}
        </laraliveui:main>

        @persist('toast')
            <laraliveui:toast.group>
                <laraliveui:toast />
            </laraliveui:toast.group>
        @endpersist

        @laraliveuiScripts
    </body>
</html>
