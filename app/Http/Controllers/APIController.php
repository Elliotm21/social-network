<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    public function index()
    {
        $client = new Client();
        $api_response = $client->get('https://opentdb.com/api.php?amount=10');
        $response = json_decode($api_response);
        return view('posts.index', compact('response'));
    }
}