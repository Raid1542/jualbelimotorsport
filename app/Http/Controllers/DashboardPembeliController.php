<?php

// app/Http/Controllers/DashboardPembeliController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPembeliController extends Controller
{
    public function index()
    {
        return view('pages.dashboard'); // pastikan file dashboard.blade.php ada di views
    }
}
