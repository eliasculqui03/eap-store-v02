<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'EAP Store' }}</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
</head>

<body class="bg-slate-200 ">

    @livewire('partials.navbar')

    <main>

        {{ $slot }}

        @livewireScripts

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </main>

    @livewire('partials.footer')

</body>

</html>
