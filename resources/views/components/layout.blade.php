<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Daily Language Learning Companion' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
        <h1>{{ $header ?? 'Daily Language Learning Companion' }}</h1>
        <div id="content">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
