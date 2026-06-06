<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <laraliveui:navlist aria-label="{{ __('Settings') }}">
            <laraliveui:navlist.item :href="route('profile.edit')" wire:navigate>{{ __('Profile') }}</laraliveui:navlist.item>
            <laraliveui:navlist.item :href="route('security.edit')" wire:navigate>{{ __('Security') }}</laraliveui:navlist.item>
            <laraliveui:navlist.item :href="route('appearance.edit')" wire:navigate>{{ __('Appearance') }}</laraliveui:navlist.item>
        </laraliveui:navlist>
    </div>

    <laraliveui:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6">
        <laraliveui:heading>{{ $heading ?? '' }}</laraliveui:heading>
        <laraliveui:subheading>{{ $subheading ?? '' }}</laraliveui:subheading>

        <div class="mt-5 w-full max-w-lg">
            {{ $slot }}
        </div>
    </div>
</div>
