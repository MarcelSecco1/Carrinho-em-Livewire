@include('header')
@include('navigation-menu')

@livewireScripts

<main>
    {{ $slot }}
</main>
@include('footer')
