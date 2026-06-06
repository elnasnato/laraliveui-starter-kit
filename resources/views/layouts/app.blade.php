<x-layouts::app.sidebar :title="$title ?? null">
    <laraliveui:main>
        {{ $slot }}
    </laraliveui:main>
</x-layouts::app.sidebar>
