<div
    x-data="{ show: @entangle($attributes->wire('model'))}" x-cloak
    x-show="show" x-on:keydown.escape.window="show = false"  class=".......>
    class="fixed inset-0 overflow-y-auto py-6 md:py-24 sm:px-0 z-50">
{{ $slot }}
</div>
