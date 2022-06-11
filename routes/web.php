<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/', "index")->name("home.index");

    Route::get('/register', "register")->name("home.register");
    Route::get('/login', "login")->name("home.login");

    Route::post('/register', "registerSubmit")->name("home.registerSubmit");
    Route::post('/login', "loginSubmit")->name("home.loginSubmit");
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/profile', "profile")->name("dashboard.profile");

    Route::get('/dashboard', "index")->name("dashboard.index");

    Route::get('/details', "userDetails")->name("dashboard.userDetails");
    Route::get('/details/{id}', "getUser")->name("dashboard.getUser");

    Route::get('/logout', "logout")->name("dashboard.logout");
});
