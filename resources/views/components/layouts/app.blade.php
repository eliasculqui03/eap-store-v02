<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'EAP Store' }}</title>

    {{-- Incluye tus archivos CSS y JS de Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Estilos de Livewire --}}
    @livewireStyles
</head>

<body class="pb-20 bg-slate-200 md:pb-0">

    @livewire('partials.navbar')

    <main class="min-h-screen">
        {{ $slot }}

    </main>

    @livewireScripts

    @livewire('partials.menu-movil')



</body>

</html>
