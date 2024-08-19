<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LanguageController extends Controller
{
    public function index()
    {
        // fetch data
        $wordData = $this->fetchWordOfTheDay();
        $quoteData = $this->fetchQuoteOfTheDay();

        return view('welcome', compact('wordData', 'quoteData'));
    }

    private function fetchWordOfTheDay()
    {
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'wordsapiv1.p.rapidapi.com',
            'x-rapidapi-key' => env('WORDS_API_KEY')
        ])->withoutVerifying()->get('https://wordsapiv1.p.rapidapi.com/words/');

        return $response->json();
    }

    private function fetchQuoteOfTheDay()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-rapidapi-host' => 'andruxnet-random-famous-quotes.p.rapidapi.com',
            'x-rapidapi-key' => env('QUOTES_API_KEY')
        ])->withoutVerifying()->post('https://andruxnet-random-famous-quotes.p.rapidapi.com/?count=1&cat=movies', []);

        return $response->json();
    }
}
