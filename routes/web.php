<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AuthController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('index');
    } else {
        return redirect()->route('login');
    }
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', function () {
        if (Auth::check()) {
            return redirect()->route('index');
        } else {
            return view('admin.auth.login');
        }
    })->name('login');
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware(['auth'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });
});