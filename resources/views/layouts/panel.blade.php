<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }} - Control Panel </title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=montserrat" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="flex h-screen overflow-hidden bg-background text-text-primary">

    @livewire('partials.panel.sidebar')

    <div class="flex flex-col flex-1 overflow-hidden" x-data="{ open: false }">
        <header class="z-0 flex items-center justify-between p-4 border-b shadow-md bg-container border-input-border ">
            @yield('breadcrumbs')

            <button @click="open = !open; $dispatch('sidebar')" class="flex items-center md:hidden">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path :class="{ 'hidden': open, 'block': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16 M4 12h16 M4 18h16" />
                    <path :class="{ 'block': open, 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-background">@yield('content')</main>

    </div>
</body>
</html>
