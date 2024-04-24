<!DOCTYPE html>
<html lang="{{  App::currentLocale(); }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }} - {{ $title }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=montserrat" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles()

</head>

<body class="pb-20 bg-background text-text-primary">

    <div class="background"></div>

    @livewire('partials.navigation')

    @guest
        @livewire('partials.auth.register')

        @livewire('partials.auth.login')
    @endguest

    {{ $slot }}

    @if(session('alert'))
            @livewire('alerts')
    @endif
       
    @livewireScripts()
</body>

</html>