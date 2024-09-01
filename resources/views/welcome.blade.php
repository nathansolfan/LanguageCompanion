<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Daily Language Learning Companion' }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 text-gray-800 font-sans leading-normal">
    <div id="app" class="container mx-auto p-6">
        <h1 class="text-4xl font-bold text-center text-blue-600 mb-6">{{ $header ?? 'Daily Language Learning Companion' }}</h1>
        <div id="content" class="bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('fetchWord') }}" method="POST" class="mb-4">
                @csrf
                <label for="word" class="block text-lg font-medium text-gray-700">Enter a word:</label>
                <input type="text" id="word" name="word" required
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                <button type="submit"
                    class="mt-4 w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition duration-200">
                    Get Word
                </button>
            </form>

            <div id="word-of-the-day" class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-700 mb-2">Word of the Day</h2>
                <p class="text-xl text-gray-800">{{ $wordData['word'] ?? 'No word available' }}</p>
                <p class="text-md text-gray-600">Definition: {{ $wordData['results'][0]['definition'] ?? 'No definition available' }}</p>
            </div>

            <div id="motivational-quote">
                <h2 class="text-2xl font-semibold text-gray-700 mb-2">Daily Motivational Quote</h2>
                <p class="text-xl italic text-gray-800">"{{ $quoteData[0]['quote'] ?? 'No quote available' }}"</p>
                <p class="text-md text-gray-600 text-right">- {{ $quoteData[0]['author'] ?? 'Unknown' }}</p>
            </div>
        </div>
    </div>
</body>
</html>
