<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LanguageController extends Controller
{
    public function index()
    {
        // fetch data
        $wordData = $this->fetchWordOfTheDay();
        $quoteData = $this->fetchQuoteOfTheDay();

        // Log or dump the data to see what you're getting
        // Log::info($wordData);
        // Log::info($quoteData);
        // dd($wordData, $quoteData);

        return view('welcome', compact('wordData', 'quoteData'));
    }

    private function fetchWordOfTheDay()
    {
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'wordsapiv1.p.rapidapi.com',
            'x-rapidapi-key' => env('WORDS_API_KEY')
        ])->get('https://wordsapiv1.p.rapidapi.com/words/banana');

        if ($response->successful()) {
            return $response->json();
        } else {
            return $response->json(); // for debugging
        }
    }

    private function fetchQuoteOfTheDay()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-rapidapi-host' => 'andruxnet-random-famous-quotes.p.rapidapi.com',
            'x-rapidapi-key' => env('QUOTES_API_KEY')
        ])->post('https://andruxnet-random-famous-quotes.p.rapidapi.com/?count=1&cat=movies', []);

        return $response->json();
    }
}
