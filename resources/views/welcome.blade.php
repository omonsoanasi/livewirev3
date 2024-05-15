<x-guest-layout>
    @if (Route::has('login'))
        <livewire:auth-navigation />
    @endif

    <livewire:home-component/>
</x-guest-layout>
