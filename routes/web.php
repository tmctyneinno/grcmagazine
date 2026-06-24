<?php
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/risk-esg', [HomeController::class, 'riskESG'])->name('risk-esg');
Route::get('/fincrime-aml', [HomeController::class, 'fincrimeAML'])->name('fincrime-aml');
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// ✅ Article route
Route::get('/article/{slug}', [HomeController::class, 'showDetails'])->name('articles.show');