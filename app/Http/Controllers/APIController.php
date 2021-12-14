<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    public function index()
    {
        $client = new Client();
        $api_response = $client->get('https://api.envato.com/v1/discovery/search/search/item?site=themeforest.net&category=wordpress&sort_by=relevance&access_token=TOKEN');
        $response = json_decode($api_response);
        return view('posts.index', compact('response'));
    }
}