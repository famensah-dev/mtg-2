<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CampaignDayController;
use App\Http\Controllers\LocationController;
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

Route::resource('/campaigns', CampaignController::class);
Route::resource('/locations', LocationController::class);
Route::resource('/tenants', TenantController::class);
Route::resource('/volunteers', VolunteerController::class);
Route::resource('/service-areas', ServiceAreaController::class);
Route::resource('/volunteer-days', VolunteerDayController::class);
Route::resource('/campaign-days', CampaignDayController::class);

// Route::get('trial', function(){
//     return view('trial');
// })->name('trial');

// Route::post('/trial', function(Request $request){
//     // $trial = Trial::create([
//     //     "date" => $request->date,
//     //     "start_time" => $request->start_time,
//     //     "end_time" => $request->end_time
//     // ]);
//     dd($request);
// })->name('trial');
