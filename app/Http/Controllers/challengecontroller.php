<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
class challengecontroller extends Controller
{
    public function index()
    {
      
        $challenges = Challenge::all();

        return view('challenges.index', compact( 'challenges'));
    }
}
