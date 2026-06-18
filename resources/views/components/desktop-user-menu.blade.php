<laraliveui:dropdown position="bottom" align="start">
    <laraliveui:sidebar.profile
        {{ $attributes->only('name') }}
        :initials="auth()->user()->initials()"
        icon:trailing="chevrons-up-down"
        data-test="sidebar-menu-button"
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
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <laraliveui:menu.item
                    as="button"
                    type="submit"
                    icon="arrow-right-start-on-rectangle"
                    class="w-full cursor-pointer"
                    data-test="logout-button"
                >
                    {{ __('Log Out') }}
                </laraliveui:menu.item>
            </form>
        </laraliveui:menu.radio.group>
    </laraliveui:menu>
</laraliveui:dropdown>
