<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;;

class ScrapeController extends Controller
{
    public function scrape(Request $request)
    {
        $client = new Client();

        $crawler = $client->request('GET', request('url'));

        $h1 = $crawler->filter("h1")->text();
        $a = $crawler->filter("a")->text();

        return response()->json(["h1" => $h1, "a" => $a]);
    }
}
