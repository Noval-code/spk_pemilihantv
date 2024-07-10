<?php

use App\Http\Controllers\AlternativeAnalysisController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CriteriaAnalysisController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\TesIlmu;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing_page.index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/products', [ProductController::class, 'index'])->name('/products');
    Route::get('/products/create', [ProductController::class, 'create'])->name('/products/create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('/products/store');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('/products/edit');
    Route::put('/products/edit/{id}', [ProductController::class, 'update'])->name('/products/update');
    Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('/products/delete');

    Route::get('/criterias', [CriteriaController::class, 'index'])->name('/criterias');
    Route::get('/criterias/create', [CriteriaController::class, 'create'])->name('/criterias/create');
    Route::post('/criterias/store', [CriteriaController::class, 'store'])->name('/criterias/store');
    Route::get('/criterias/edit/{id}', [CriteriaController::class, 'edit'])->name('/criterias/edit');
    Route::put('/criterias/edit/{id}', [CriteriaController::class, 'update'])->name('/criterias/update');
    Route::get('/criterias/delete/{id}', [CriteriaController::class, 'delete'])->name('/criterias/delete');

    Route::get('/alternatives', [AlternativeController::class, 'index'])->name('/alternatives');
    Route::get('/alternatives/create', [AlternativeController::class, 'create'])->name('/alternatives/create');
    Route::post('/alternatives/store', [AlternativeController::class, 'store'])->name('/alternatives/store');
    Route::get('/alternatives/edit/{id}', [AlternativeController::class, 'edit'])->name('/alternatives/edit');
    Route::put('/alternatives/edit/{id}', [AlternativeController::class, 'update'])->name('/alternatives/update');
    Route::get('/alternatives/delete/{id}', [AlternativeController::class, 'delete'])->name('/alternatives/delete');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/criteria_analysis', [CriteriaAnalysisController::class, 'index'])->name('criteria_analysis.index');
    Route::post('/criteria_analysis', [CriteriaAnalysisController::class, 'store'])->name('criteria_analysis.store');
    Route::get('/criteria_analysis/reset', [CriteriaAnalysisController::class, 'reset'])->name('criteria_analysis.reset');

    Route::get('/alternative_analysis', [AlternativeAnalysisController::class, 'index'])->name('alternative_analysis.index');
    Route::post('/alternative_analysis', [AlternativeAnalysisController::class, 'store'])->name('alternative_analysis.store');
    Route::get('/alternative_analysis/reset', [AlternativeAnalysisController::class, 'reset'])->name('alternative_analysis.reset');

    Route::get('/rankings', [RankingController::class, 'index'])->name('rankings.index');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/auth/redirect', [SocialiteController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/google/callback', [SocialiteController::class, 'callback'])->name('auth.callback');
require __DIR__ . '/auth.php';
