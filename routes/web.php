<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CampaignDayController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterForCampaignController;
use App\Http\Controllers\ServiceAreaController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\VolunteerDayController;
use App\Models\CampaignDay;
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

    Route::resource('/campaigns', CampaignController::class);
    Route::resource('/volunteers', VolunteerController::class);

    Route::resource('/service-areas', ServiceAreaController::class)->except(['create']);
    Route::resource('/locations', LocationController::class)->except(['create']);
    Route::resource('/tenants', TenantController::class)->except(['create']);

    Route::get('/campaign-days/{campaign_id}', [CampaignDayController::class, 'index'])->name('campaign.days.index'); // Both admin and volunteer need this
    Route::post('/campaign-days/{campaign_id}', [CampaignDayController::class, 'store'])->name('campaign.days.store');  ///Admin uses this
    Route::get('/campaign-days/{campaign_id}/create', [CampaignDayController::class, 'create'])->name('campaign.days.create');
    
    Route::get('/show-registration-form', [RegisterForCampaignController::class, 'create'])->name('register.campaign.create');
    Route::post('/register-for-campaign', [RegisterForCampaignController::class, 'store'])->name('register.campaign.store');


    // Route::resource('/volunteers/{campaign_id}/days', VolunteerDayController::class);
    // Route::resource('campaigns.days', CampaignDayController::class);





    require __DIR__.'/auth.php';






    // Route::get('/campaigns/schedules', [CampaignDayController::class, 'index']);
    // Route::post('/campaigns/schedules', [CampaignDayController::class, 'store']);
    // Route::get('/campaigns/schedules/{id}', [CampaignDayController::class, 'create']);

// Route::prefix('tenant')->group(function(){
//     Route::get('/register', [TenantController::class, 'register'])->name('tenant.register');
//     Route::get('/login', [TenantController::class, 'login'])->name('tenant.login');
// });

// Route::middleware('auth')->prefix('{tenant_id}')->group(function () {
//     Route::resource('/campaigns', CampaignController::class);
// });

