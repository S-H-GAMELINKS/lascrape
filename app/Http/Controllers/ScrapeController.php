<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrapeController extends Controller
{
    public function scrape(Request $request)
    {
        $goutte = GoutteFacade::request('GET', request('url'));

        return response()->json($goutte);
    }
}
