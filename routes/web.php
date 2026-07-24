<?php
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/technology-ai-regTech', [HomeController::class, 'technologyAIRegTech'])->name('risk-esg');
Route::get('/governance-risk-esg', [HomeController::class, 'governanceRiskEsg'])->name('governance-risk-esg'); 
Route::get('/fincrime-aml', [HomeController::class, 'fincrimeAML'])->name('fincrime-aml');
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// ✅ Article route
Route::get('/article/{slug}', [HomeController::class, 'showDetails'])->name('articles.show');

// ✅ Event Details Route
Route::get('/event/{slug}', [HomeController::class, 'showEventDetails'])->name('events.show');