<?php

use App\Http\Controllers\Backend\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard' , [VendorController::class , 'dashboard'])
    ->middleware('auth' , 'role:vendor')
    ->name('dashboard');

