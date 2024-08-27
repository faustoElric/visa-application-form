<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TownshipsController;
use App\Http\Controllers\WorkExperienceController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [ProfileController::class, 'profileForm'])->name('candidate-form');
Route::post('/candidate-form-store', [ProfileController::class, 'store'])->name('candidate-form-store');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/townships-list-by-state/{id}', [TownshipsController::class,'townshipListByState'])->name('townships-list-by-state');
//Route::delete('/remove-work-experience-by-id/{id}', [WorkExperienceController::class,'destroyWorkExperienceByID'])->name('remove-work-experience-by-id');
Route::get('/check-dui/{dui}', [ProfileController::class,'checkingDUI'])->name('check-dui');
Route::get('/total-counters', [ProfileController::class, 'totalUsers'])->name('admin.profiles.counter');

Route::middleware('auth')->group(function () {
    Route::get('admin/profiles', [ProfileController::class, 'index'])->name('admin.profiles.index');
    Route::get('admin/profiles/{id}', [ProfileController::class, 'show'])->name('admin.profiles.show');
});
