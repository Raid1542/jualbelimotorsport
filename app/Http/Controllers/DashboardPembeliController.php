<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardPembeliController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }
}


