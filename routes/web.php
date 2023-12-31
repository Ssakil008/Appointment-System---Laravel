<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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

Route::get("/", [ProjectController::class,"getAllDepartments"]);
Route::post("/showappointments", [ProjectController::class,"showAppointments"])->middleware("auth");
Route::post("/bookappointment", [ProjectController::class,"bookAppointment"])->middleware("auth");
Route::get("/myBookings", [ProjectController::class,"myBookings"])->middleware("auth");
Route::post("/cancelBooking", [ProjectController::class,"cancelBooking"])->middleware("auth");
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

