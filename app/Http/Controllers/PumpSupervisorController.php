<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PumpSupervisorController extends Controller
{
    public function index()
    {
        return view('pump_supervisor.dashboard'); // Create this Blade file
    }
}
