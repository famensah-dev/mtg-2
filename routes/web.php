<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CampaignDayController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceAreaController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\VolunteerDayController;
use App\Models\Trial;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('/campaigns', CampaignController::class);
Route::resource('/locations', LocationController::class);
Route::resource('/tenants', TenantController::class);
Route::resource('/volunteers', VolunteerController::class);
Route::resource('/service-areas', ServiceAreaController::class);
Route::resource('/volunteer-days', VolunteerDayController::class);
Route::resource('/campaign-days', CampaignDayController::class);
