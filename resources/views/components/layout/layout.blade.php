<!DOCTYPE html>
<html lang="en">

<head>
    <meta class="" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Idea</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-foreground">
    <x-layout.nav />
    <main class="mx-auto max-w-7xl px-6 pt-4">
        {{ $slot }}
    </main>
    @session('success')
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
             x-transition.opacity.duration.600ms
             class="bg-primary px-4 py-3 absolute bottom-4 right-4 rounded-lg">
            {{ $value }}
        </div>
    @endsession
</body>

</html>
