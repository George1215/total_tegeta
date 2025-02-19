<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PumpAttendantController extends Controller
{
    public function index()
    {
        return view('pump_attendant.dashboard'); // Create this Blade file
    }
}
