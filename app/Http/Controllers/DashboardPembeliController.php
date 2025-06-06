<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardPembeliController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.dashboard', compact('user'));
    }
}

