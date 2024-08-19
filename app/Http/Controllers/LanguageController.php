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

        return view('welcome', compact('wordData', 'quoteData'));
    }

    private function fetchWordOfTheDay()
    {
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'wordsapiv1.p.rapidapi.com',
            'x-rapidapi-key' => env('WORDS_API_KEY')
        ])->get('https://wordsapiv1.p.rapidapi.com/words/');

        return $response->json();
    }
}
