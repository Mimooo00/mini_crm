<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;

Route::get('/companies/{company}', [CompanyController::class, 'show']);
