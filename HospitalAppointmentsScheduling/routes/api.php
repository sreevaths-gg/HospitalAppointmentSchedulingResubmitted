<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AppointmentController;

/*
|--------------------------------------------------------------------------
| Test Route
|--------------------------------------------------------------------------
*/

Route::get('/test', function () {
    return response()->json([
        'success' => true,
        'message' => 'API Working'
    ]);
});

/*
|--------------------------------------------------------------------------
| Available Appointment Slots
|--------------------------------------------------------------------------
|
| Example:
| GET /api/doctors/1/available-slots?date=2026-06-20
|
*/

Route::get(
    '/doctors/{doctor}/available-slots',
    [AppointmentController::class, 'availableSlots']
);

Route::get('/departments', [ApiController::class, 'departments']);
Route::get('/doctors', [ApiController::class, 'doctors']);
Route::get('/patients', [ApiController::class, 'patients']);
