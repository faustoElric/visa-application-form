<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


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

/**Route::get('/', function () {
    return view('candidate-form');
});**/

Auth::routes();

Route::get('/', [App\Http\Controllers\ProfileController::class, 'profileForm'])->name('candidate-form');
Route::post('/candidate-form-store', [ProfileController::class, 'store'])->name('candidate-form-store');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('admin/profiles', [ProfileController::class, 'index'])->name('admin.profiles.index');
    Route::get('admin/profiles/{id}', [ProfileController::class, 'show'])->name('admin.profiles.show');
});
