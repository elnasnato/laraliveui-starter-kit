@props([
    'title',
    'description',
])

<div class="flex w-full flex-col text-center">
    <laraliveui:heading size="xl">{{ $title }}</laraliveui:heading>
    <laraliveui:subheading>{{ $description }}</laraliveui:subheading>
</div>
