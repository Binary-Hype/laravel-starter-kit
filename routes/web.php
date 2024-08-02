<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/account', function () {
        return view('account');
    })->name('account');
});

    /*
    |--------------------------------------------------------------------------
    | Protected Route Requiring Password Confirmation
    |--------------------------------------------------------------------------
    |
    | This route is protected by the 'password.confirm' middleware provided by
    | Laravel Fortify. This middleware ensures that the user has confirmed their
    | password within a specific time frame (e.g., the last 3 hours). If the
    | user has not confirmed their password recently, they will be redirected
    | to a password confirmation screen before accessing this route.
    |
    | You can use this route to protect sensitive actions such as updating
    | sensitive information, deleting an account, or any other critical actions
    | where an additional layer of security is desired.
    |
    */

    //Route::middleware(['auth', 'verified', 'password.confirm'])->group(function () {
    //    Route::get('/account', function () {
    //        return view('account');
    //    })->name('account');
    //});


