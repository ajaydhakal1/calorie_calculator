<?php

use App\Http\Controllers\CalorieController;
use App\Http\Controllers\DietPlanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/calorie-calculator', [CalorieController::class, 'showForm']);
Route::post('/calorie-calculator', [CalorieController::class, 'calculate'])->name('calculate');
Route::get('my_history', [CalorieController::class, 'showHistory'])->name('my_history');

Route::get('/get-plan', [CalorieController::class, 'dietPlan'])->name('dietplan');

Route::get('/diet-plan', function () {
    return view('diet_plan');
})->name('diet.plan');

Route::post('/diet-plan', [DietPlanController::class, 'generate'])->name('diet.plan.generate');

require __DIR__ . '/auth.php';
