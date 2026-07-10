<?php

use App\Models\Company;
use App\Models\Employee;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalCompanies = Company::count();
    $totalEmployees = Employee::count();
    $recentCompanies = Company::latest()->take(5)->get();
    $recentEmployees = Employee::with('company')->latest()->take(5)->get();
    return view('dashboard', compact('totalCompanies', 'totalEmployees', 'recentCompanies', 'recentEmployees'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
