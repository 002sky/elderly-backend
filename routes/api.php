<?php

use App\Http\Controllers\dailyScheduleController;
use App\Http\Controllers\ElderlyProfileController;
use App\Http\Controllers\medicationController;
use App\Http\Controllers\scheduleController;
use App\Http\Controllers\imageController;
use App\Http\Controllers\medication_notification_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Models\medication;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [UsersController::class, 'login']);
    Route::post('/register', [UsersController::class, 'register']);
    Route::get('/logout', [UsersController::class, 'logout'])->middleware('auth:api');
});

Route::group(['prefix' => 'admin'], function () {
    //profile function

    Route::post('/createProfile', [ElderlyProfileController::class, 'createElderlyProfile']);
    Route::post('/editElderlyProfile', [ElderlyProfileController::class, 'editElderlyProfile']);
    Route::get('/viewProfile', [ElderlyProfileController::class, 'viewElderlyProfile']);
    Route::get('/viewProfileByID/{id}', [ElderlyProfileController::class, 'viewElderlyProfileByID']);


    //schedule function 
    Route::post('/addSchedule', [scheduleController::class, 'addSchedule']);
    Route::post('/getSchduleData', [scheduleController::class, 'getSchduleData']);

    //medication function route
    Route::post('/setMedication', [medicationController::class, 'setMedication']);
    Route::get('/getMedication', [medicationController::class, 'getMedication']);
    Route::post('/setMedicationTiming', [medication_notification_controller::class, 'setMedicationTiming']);
    Route::get('/getMedicationTiming', [medication_notification_controller::class, 'getMedicationTiming']);

    //daily schedule function route
    Route::get('/scheduleWithin6Hour', [dailyScheduleController::class, 'scheduleWithin6Hour']);
    Route::post('/taskDetail', [dailyScheduleController::class, 'taskDetail']);


    

});
