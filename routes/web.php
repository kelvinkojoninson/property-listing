<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\RentController;
use App\Models\Properties;
use App\Models\States;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(["verified", "auth"])->group(function () {
    Route::get('/dashboard', [RouteController::class, 'dashboard'])->name('dashboard');
     Route::get('/payments', [RouteController::class, 'payments'])->name('payments');
    Route::get('/building-types', [RouteController::class, 'buildingTypes'])->name('buildingTypes');
    Route::get('/properties', [RouteController::class, 'properties'])->name('properties');
    Route::get('/transfers', [RouteController::class, 'transfers'])->name('transfers');
    Route::get('/appointments', [RouteController::class, 'appointments'])->name('appointments');
    Route::get('/agents', [RouteController::class, 'agents'])->name('agents');
    Route::get('/enquiries', [RouteController::class, 'enquiries'])->name('enquiries');
    Route::get('/tenants', [RouteController::class, 'tenants'])->name('tenants');
    Route::get('/my-rents', [RouteController::class, 'myRents'])->name('myrents');

});
Route::get('/', [RouteController::class, 'welcome'])->name('welcome');
Route::get('/dashboard-map', [RouteController::class, 'dashboardMap'])->name('dashboard-map');
Route::get('/properties-grid/{buildingType}/{location}/{contractType}', [RouteController::class, 'propertyGrid'])->name('properties-grid');
Route::get('/properties-list/{buildingType}/{location}/{contractType}', [RouteController::class, 'propertyList'])->name('properties-list');
Route::get('/property/{propertyID}', [RouteController::class, 'propertyDetails'])->name('properties-details');
Route::get('/portfolio-gallery/{buildingType}', [RouteController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/{propertyID}', [RouteController::class, 'portfolioDetails'])->name('portfolio-details');
Route::get('/contact', [RouteController::class, 'contact'])->name('contact');
Route::get('/about', [RouteController::class, 'about'])->name('about');
Route::get('/bookings', [RouteController::class, 'bookings'])->name('bookings');
Route::get('/portfolio-grid/{buildingType}/{location}/{contractType}', [RouteController::class, 'propertyGrid'])->name('properties-grid');

// Route::post('/send_message', [EnquiryController::class, 'sendMessage'])->name('send-message');

Route::get("/payment/callback", [RentController::class, "handleGatewayCallback"])->name('payment');

Route::get('test', function(){
$props =  Properties::select('transid','title')->get();
foreach ($props as $prop) {
    Properties::where('transid', $prop->transid)->update([
        'slug' => Str::slug($prop->title. ' ' . bin2hex(random_bytes(10))),
    ]);
}
return true;
});


require __DIR__.'/auth.php';
