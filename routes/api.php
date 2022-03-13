<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildingTypeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdvertismentController;
use App\Http\Controllers\AgentsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\TenantController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// BUILDING TYPES ROUTE
Route::prefix("building_types")->group(function () {
    Route::post("update", [BuildingTypeController::class, "update"]);
    Route::post("delete", [BuildingTypeController::class, "deleteBuildingType"]);
});
Route::resource("building_types", BuildingTypeController::class);

// PAYMENT ROUTE
Route::prefix("payments")->group(function () {
    Route::get("{userid}/{property}/{dateFrom}/{dateTo}", [PaymentController::class, "payments"]);
    Route::get("logs/{userid}/{property}/{dateFrom}/{dateTo}", [PaymentController::class, "logs"]);
});
Route::resource("payments", PaymentController::class);

// PROPERTIES ROUTE
Route::prefix("properties")->group(function () {
    Route::post("update", [PropertyController::class, "update"]);
    Route::post("delete", [PropertyController::class, "deleteProperty"]);
});
Route::resource("properties", PropertyController::class);

// TRANSFERS ROUTE
Route::prefix("transfers")->group(function () {
    Route::post("update", [TransferController::class, "update"]);
    Route::get("trash", [TransferController::class, "trash"]);
    Route::post("delete", [TransferController::class, "deleteTransfer"]);
    Route::post("restore", [TransferController::class, "restoreTransfer"]);
});
Route::resource("transfers", TransferController::class);

// TRANSFERS ROUTE
Route::prefix("appointments")->group(function () {
    Route::post("update", [AppointmentController::class, "update"]);
    Route::get("{user}/{dateFrom}/{dateTo}", [AppointmentController::class, "appointments"]);
    Route::get("trash/{user}/{dateFrom}/{dateTo}", [AppointmentController::class, "trash"]);
    Route::post("delete", [AppointmentController::class, "deleteAppointment"]);
    Route::post("restore", [AppointmentController::class, "restoreAppointment"]);
});
Route::resource("appointments", AppointmentController::class);

// AGENTS ROUTE
Route::prefix("agents")->group(function () {
    Route::post("update", [AgentsController::class, "update"]);
    Route::post("assign", [AgentsController::class, "assign"]);
    Route::post("assign_property", [AgentsController::class, "assignProperty"]);
    Route::post("update_assign_property", [AgentsController::class, "updateAssignProperty"]);
    Route::post("invite", [AgentsController::class, "inviteAgent"]);
    Route::get("agent/{userid}", [AgentsController::class, "agents"]);
    Route::get("properties/{userid}", [AgentsController::class, "properties"]);
    Route::get("trash", [AgentsController::class, "trash"]);
    Route::post("delete", [AgentsController::class, "deleteAgent"]);
    Route::post("delete_agent_property", [AgentsController::class, "deleteAgentProperty"]);
    Route::post("delete_owner_agent", [AgentsController::class, "deleteOwnerAgent"]);
    Route::post("restore", [AgentsController::class, "restoreAgent"]);
});
Route::resource("agents", AgentsController::class);

// ENQUIRY ROUTE
Route::prefix("enquiries")->group(function () {
    Route::post("update", [EnquiryController::class, "update"]);
    Route::get("{dateFrom}/{dateTo}", [EnquiryController::class, "enquiries"]);
    Route::get("trash/{dateFrom}/{dateTo}", [EnquiryController::class, "trash"]);
    Route::post("delete", [EnquiryController::class, "deleteEnquiry"]);
    Route::post("send_message", [EnquiryController::class, "sendMessage"]);
});
Route::resource("enquiries", EnquiryController::class);

// BOOKINGS ROUTE
Route::prefix("booking")->group(function () {
    Route::get("{userid}/{property}/{dateFrom}/{dateTo}", [BookingsController::class, "bookings"]);
    Route::post("update", [BookingsController::class, "update"]);
    Route::post("delete", [BookingsController::class, "deleteBooking"]);
});
Route::resource("booking", BookingsController::class);

// TENANTS ROUTE
Route::prefix("tenants")->group(function () {
    Route::post("assign_property", [TenantController::class, "assignProperty"]);
    Route::post("update_assign_property", [TenantController::class, "updateAssignProperty"]);
    Route::get("properties/{userid}/{property}", [TenantController::class, "properties"]);
    Route::post("delete_tenant_property", [TenantController::class, "deleteTenantProperty"]);
});
Route::resource("tenants", TenantController::class);

// WALLETS ROUTE
Route::prefix("rent")->group(function () {
   Route::get("wallets", [RentController::class, "wallets"]);
   Route::get("wallets/history/{tenant}/{dateFrom}/{dateTo}", [RentController::class, "walletHistory"]);
   Route::post("load-wallet", [RentController::class, "pay"])->name('pay');
});
Route::resource("rent", RentController::class);
