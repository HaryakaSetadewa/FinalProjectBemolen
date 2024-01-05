<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BackpageController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\MapsBackpageController;
use App\Http\Middleware\AdminMiddleware;
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
    return view('components.landing-page');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware([AdminMiddleware::class])->group(function () {
    Route::resource('backpages', BackpageController::class);
Route::resource('perusahaans', PerusahaanController::class);
Route::resource('maps_backpage', MapsBackpageController::class);
Route::resource('reviews', ReviewController::class);
});

Route::get('/bemolen', [LandingpageController::class, 'index'])->name('bemolen');
Route::get('/infobengkel', [LandingpageController::class, 'bengkel'])->name('infobengkel');
Route::get('/maps', [LandingpageController::class, 'maps'])->name('maps-page');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/detailbengkel/{id}', [LandingpageController::class, 'detailbengkel'])->name('detailbengkel');
});

require __DIR__.'/auth.php';
