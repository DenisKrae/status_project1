<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrupalStatusController;
use App\Http\Controllers\ProfileController; // Vergiss nicht, den ProfileController zu importieren
use App\Http\Controllers\SiteController;
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

// Anmeldeseite als Startseite
Route::get('/', function () {
    return view('auth.login');
});


// Andere Routen
Route::get('/drupal-status', [DrupalStatusController::class, 'fetchDrupalStatus']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentifizierungsrouten
require __DIR__ . '/auth.php';

// Route::get('/dashboard', function () {

//     return view('dashboard');
// })->middleware(['auth', 'verified']);

Route::middleware(['web'])->group(function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        // Routes that require authentication and verification
        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // });
        Route::post('/neue-site-hinzufügen', [SiteController::class, 'store'])->name('form.submit');
        Route::get('/neue-seite', [SiteController::class, 'index'])->name('show.neue.seite.form');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('show.dashboard');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('sites', App\Http\Controllers\SiteController::class);