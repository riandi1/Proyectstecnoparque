<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>

<body>

    <div class="container mx-auto">
        <h1 class="text-3xl text-center my-10">Users</h1>
    </div>

    <div class="container mx-auto">
        {{ $slot}}
    </div>

    @livewireScripts
</body>

</html>
