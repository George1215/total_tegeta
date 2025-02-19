<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuelAssistantController extends Controller
{
    public function index()
    {
        return view('fuel_assistant.dashboard'); // Create this Blade file
    }
}
