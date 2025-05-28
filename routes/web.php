<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfildController;
use App\Http\Controllers\ProdukController;



Route::get('/', function () {
    return view('welcome');
});



    

