<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Language Learning Companion</title>
    @vite('resources/css/app.css')


</head>
<body>
    <div id="app">
        <h1>Daily Language Learning Companion</h1>

         <!-- Form for user input -->
         <form action="{{ route('fetchWord') }}" method="POST">
            @csrf
            <label for="word">Enter a word:</label>
            <input type="text" id="word" name="word" required>
            <button type="submit">Get Word</button>
        </form>

        <div id="content">
            <h2>Word of the Day</h2>
            <p>{{ $wordData['word'] ?? 'No word available' }}</p>
            <p>Definition: {{ $wordData['results'][0]['definition'] ?? 'No definition available' }}</p>

            <h2>Daily Motivational Quote</h2>
            <p>"{{ $quoteData[0]['quote'] ?? 'No quote available' }}" - {{ $quoteData[0]['author'] ?? 'Unknown' }}</p>
        </div>
    </div>
</body>
</html>
