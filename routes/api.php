<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IvrSmsController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\MonthlySummaryReportController;

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


Route::post('send-ivrclip-download-link', [IvrSmsController::class, 'sendIvrClipDownloadLink']);

Route::get('filter-option', [DashboardController::class, 'filterOptionApi']);

Route::get('dashboard-api-call', [DashboardController::class, 'dashboardApiCall']);

Route::post('dashboard-history-api-call', [DashboardController::class, 'dashboardHistoryFilterApiCall']);

Route::post('dashboard-call-sms-api', [DashboardController::class, 'callSmsApi']);
Route::post('dashboard-outbound-receive-not-receive-total-api', [DashboardController::class, 'outboundReceiveTotalApi']);
Route::post('dashboard-outbound-sent-api', [DashboardController::class, 'outboundSentApi']);
Route::post('dashboard-outbound-receive-api', [DashboardController::class, 'outboundReceiveApi']);
Route::post('dashboard-outbound-student-receive-api', [DashboardController::class, 'outboundStudentReceiveApi']);
Route::post('dashboard-inbound-sent-api', [DashboardController::class, 'inboundSentApi']);
Route::post('dashboard-outbound-receive-content-api', [DashboardController::class, 'outboundContentReceiveApi']);
Route::post('dashboard-call-receive-hourly-api', [DashboardController::class, 'callReceiveHourlyApi']);
Route::post('request-monthly-summary-report-infography-generator', [MonthlySummaryReportController::class, 'requestCreateInfographyGenerator'])->name('request-monthly-summary-report-infography-generator');

