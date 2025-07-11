<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PolicyController;

// All REST API routes for policies
Route::apiResource('policies', PolicyController::class);
