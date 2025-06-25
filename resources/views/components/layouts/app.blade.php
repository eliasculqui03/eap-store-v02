<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    @vite('resources/css/app.css')

    @livewireStyles
</head>

<body>
    {{ $slot }}
    @livewire('partials.navbar')

    <main>

        {{ $slot }}

    </main>

    @livewire('partials.footer')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
