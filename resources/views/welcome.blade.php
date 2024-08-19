<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Language Learning Companion</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
        <h1>Daily Language Learning Companion</h1>
        <div id="content">
            <h2>Word of the Day</h2>
            <p>{{ $wordData['word'] }}</p>
            <p>Definition: {{ $wordData['results'][0]['definition'] }}</p>

            <h2>Daily Motivational Quote</h2>
            <p>"{{ $quoteData['content'] }}" - {{ $quoteData['author'] }}</p>
        </div>
    </div>
</body>
</html>
