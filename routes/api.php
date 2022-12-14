<?php

use App\Http\Controllers\appointmentController;
use App\Http\Controllers\dailyScheduleController;
use App\Http\Controllers\ElderlyProfileController;
use App\Http\Controllers\medicationController;
use App\Http\Controllers\scheduleController;
use App\Http\Controllers\imageController;
use App\Http\Controllers\medication_notification_controller;
use App\Http\Controllers\messageBoxController;
use App\Http\Controllers\statusReportController;
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


Route::group(['prefix' => 'All'], function () {
    Route::post('/getAllMessage', [messageBoxController::class, 'getAllMessage']);
    Route::post('/getAllReceiver', [messageBoxController::class, 'getAllReceiver']);
    Route::post('/sendMessage', [messageBoxController::class, 'sendMessage']);

});

Route::group(['prefix' => 'relative'], function () {

    Route::post('/getCompleteElderlyStatusByID', [statusReportController::class, 'getCompleteElderlyStatusByID']);


    //make appointment 
    Route::post('/makeAppointment', [appointmentController::class, 'makeAppointment']);
    Route::post('/getAppointmentByID', [appointmentController::class, 'getAppointmentByID']);


    

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
    Route::post('/updateMedication', [medicationController::class, 'updateMedication']);
    
    Route::post('/setMedicationTiming', [medication_notification_controller::class, 'setMedicationTiming']);
    Route::get('/getMedicationTiming', [medication_notification_controller::class, 'getMedicationTiming']);
    Route::post('/updateDailySchedule', [medication_notification_controller::class, 'updateDailySchedule']);
    


    // Route::post('/getMedicationByID', [medicationController::class, 'getMedicationByID']);

    //daily schedule function route
    Route::get('/scheduleWithin6Hour', [dailyScheduleController::class, 'scheduleWithin6Hour']);
    Route::post('/taskDetail', [dailyScheduleController::class, 'taskDetail']);
    Route::post('/updateScheduleStatus', [dailyScheduleController::class, 'updateScheduleStatus']);


    //route for elderly status report 
    Route::post('/setElderlyStatusReport', [statusReportController::class, 'setElderlyStatusReport']);
    Route::get('/viewStatusReportStatus', [statusReportController::class, 'viewStatusReportStatus']);
    Route::get('/getIncompleteElderlyStatus', [statusReportController::class, 'getIncompleteElderlyStatus']);
    Route::get('/getOverView', [medicationController::class, 'getOverView']);
    

    //get appointment 
    Route::get('/getAllApointment', [appointmentController::class, 'getAllApointment']);
    Route::post('/approvalAppointment', [appointmentController::class, 'approvalAppointment']);
    Route::get('/getAllApointmentRequest', [appointmentController::class, 'getAllApointmentRequest']);
    Route::get('/getAppointmentOverview', [appointmentController::class, 'getAppointmentOverview']);

    Route::post('/disapprovalAppointment', [appointmentController::class, 'disapprovalAppointment']);



    //get relative for dropdownmenu 
    Route::get('/getAllRelative', [UsersController::class, 'getAllRelative']);
    Route::get('/getElderlyMenu', [ElderlyProfileController::class, 'getElderlyMenu']);




});
