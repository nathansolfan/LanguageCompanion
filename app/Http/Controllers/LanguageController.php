<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use function Ramsey\Uuid\v1;

class LanguageController extends Controller
{
    public function index()
    {
        // fetch data
        $wordData = null;
        $quoteData = $this->fetchQuoteOfTheDay();

        // Log or dump the data to see what you're getting
        // Log::info($wordData);
        // Log::info($quoteData);
        // dd($wordData, $quoteData);

        return view('welcome', compact('wordData', 'quoteData'));
    }

    public function fetchWord(Request $request)
    {
        $word = $request->input('word');
        // fetch data
        $wordData = $this->fetchWordOfTheDay($word);
        $quoteData = $this->fetchQuoteOfTheDay();  // Fetch the quote as well

        return view('welcome', compact('wordData', 'quoteData'));

    }

    private function fetchWordOfTheDay($word)
    {
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'wordsapiv1.p.rapidapi.com',
            'x-rapidapi-key' => env('WORDS_API_KEY')
        ])->get("https://wordsapiv1.p.rapidapi.com/words/{$word}");

        if ($response->successful()) {
            $data = $response->json();


            // Check if results exist and extract the definition
            if (isset($data['results']) && !empty($data['results'])) {
                return $data;
            } else {
                return ['word' => $word, 'results' => [['definition' => 'No definition available']]];
            }
        } else {
            return ['word' => $word, 'results' => [['definition' => 'No definition available']]];
        }
    }

    private function fetchQuoteOfTheDay()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-rapidapi-host' => 'andruxnet-random-famous-quotes.p.rapidapi.com',
            'x-rapidapi-key' => env('QUOTES_API_KEY')
        ])->post('https://andruxnet-random-famous-quotes.p.rapidapi.com/?count=1&cat=movies', []);

        if ($response->successful()) {
            return $response->json();
        } else {
            return [['quote' => 'No quote available', 'author' => 'Unknown']];
        }
    }
}
