<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicator;
class indicatorscontroller extends Controller
{
    public function index()
    {
        // Example usage
        $indicators = Indicator::all();

        return view('indicators.index', compact('indicators'));
    }
}
