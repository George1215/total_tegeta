<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuelSupervisorController extends Controller
{
    public function index()
    {
        return view('fuel_supervisor.dashboard'); // Create this Blade file
    }
}
