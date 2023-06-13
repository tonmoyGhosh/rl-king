<?php

use Illuminate\Support\Facades\Route;

// Frontend Controller
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\RegistrationController;


// Backend Controller
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CoinAgencyUserController;
use App\Http\Controllers\Backend\HostAgencyUserController;
use App\Http\Controllers\Backend\CurrencyController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/coin-agency/register', [RegistrationController::class, 'coinAgencyRegisterForm'])->name('coinAgencyRegisterForm');
Route::post('/coin-agency/register/store', [RegistrationController::class, 'coinAgencyRegisterStore'])->name('coinAgencyRegisterStore');

Route::get('/host-agency/register', [RegistrationController::class, 'hostAgencyRegisterForm'])->name('hostAgencyRegisterForm');
Route::post('/host-agency/register/store', [RegistrationController::class, 'hostAgencyRegisterStore'])->name('hostAgencyRegisterStore');

Auth::routes();

Route::group(['middleware' => ['role:Super Admin|Admin']], function ()
{   
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('roles', [RoleController::class, 'index'])->name('role.index');

    Route::resource('users', UsersController::class);
    Route::post('change-password-request', [UsersController::class, 'changePasswordRequest'])->name('changePasswordRequest');
    Route::get('users/{user_id}/password-change',[UsersController::class,'passwordChange'])->name('users.password-change');

    Route::prefix('coin-agency-users')->group(function () 
    {
        Route::get('list', [CoinAgencyUserController::class, 'index'])->name('coin-agency-users-list');
    });

    Route::prefix('host-agency-users')->group(function () 
    {
        Route::get('list', [HostAgencyUserController::class, 'index'])->name('host-agency-users-list');
    });

    Route::get('currency/list', [CurrencyController::class, 'index'])->name('currency-list');

    // Route::resource('settings', SettingController::class);
    // Route::resource('sms-campaign', SmsCampaignController::class);

});

// Route::group(['middleware' => ['role:Super Admin|Admin|Operator']], function ()
// {
//     // Group Module
//     Route::resource('groups', GroupController::class);

//     // Contact Module
//     Route::get('contact-import', [ContactController::class, 'import'])->name('contacts.import');
//     Route::post('contact-import', [ContactController::class, 'fileImport'])->name('contacts.import');
//     Route::get('contacts/export', [ContactController::class, 'fileExport'])->name('contacts.export');
//     Route::resource('contacts', ContactController::class);

//     //IVR-Mapping Module
//     Route::resource('ivr-mapping', IvrMappingController::class);

//     Route::prefix('campaign')->group(function () {

//         Route::prefix('sms')->group(function () {
//             // Sms Inbound Campaign Module
//             Route::get('sms-inbound-campaign', [SmsInboundCampaignController::class, 'index'])->name('sms-inbound-campaign.index');
//             // Sms Campaign Module
//             Route::resource('sms-campaign', SmsCampaignController::class);
//         });

//         Route::prefix('voice')->group(function () {
//             // Ivr Voice Campaign Module
//             Route::resource('ivr-voice-campaign', IvrVoiceCampaignController::class);
//         });
//     });

//     // Sms Campaign Module
//     Route::resource('ivr-steps', IvrStepController::class);

//     Route::prefix('master_report_usage')->group(function () {
//         //Master Report (Usage)
//         Route::get('sms', [MonthlySummaryReportController::class, 'masterReportUsageSms'])->name('master_report_usage-sms');
//         Route::get('voice', [MonthlySummaryReportController::class, 'masterReportUsageVoice'])->name('master_report_usage-voice');
//         Route::get('Sms_log', [MonthlySummaryReportController::class, 'smsLogReport'])->name('master_report_usage-sms_log');
//         Route::post('Sms_log_request', [MonthlySummaryReportController::class, 'smsLogReportRequest'])->name('master_report_usage-sms_log_request');
//     });
// });

// Route::group(['middleware' => ['role:Super Admin|Admin|Operator|Viewer']], function ()
// {
//     // Dashboard Module
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//     //Report Module
//     Route::prefix('report')->group(function () {

//         // SMS Campaign Report
//         Route::get('sms-campaign-report', [SmsCampaignReportController::class, 'smsCampaignReport'])->name('sms-campaign-report');
//         Route::post('request-sms-campaign-report', [SmsCampaignReportController::class, 'requestSmsCampaignReport'])->name('request-sms-campaign-report');

//         // IVR Outbound Campaign Report
//         Route::get('ivr-outbound-voice-call-report', [IvrCampaignReportController::class, 'ivrOutboundVoiceCallReport'])->name('ivr-outbound-voice-call-report');
//         Route::post('request-ivr-outbound-voice-call-report', [IvrCampaignReportController::class, 'requestIvrOutboundVoiceCallReport'])->name('request-ivr-outbound-voice-call-report');

//         //Ivr Usage Report
//         Route::get('ivr-call-usages-report', [IvrCampaignReportController::class, 'usageReport'])->name('ivr-call-usages-report');
//         Route::post('ivr-call-usages-report', [IvrCampaignReportController::class, 'requestUsageReport'])->name('request-ivr-call-usages-report');
//         Route::post('ivr-usage-report-generate-pdf', [IvrCampaignReportController::class, 'usageReportGeneratePDF'])->name('ivr-usage-report-generate-pdf');

//         //Ivr Call Receive Report
//         Route::get('ivr-call-receive-report', [IvrCampaignReportController::class, 'receiveReport'])->name('ivr-call-receive-report');
//         Route::post('ivr-call-receive-report', [IvrCampaignReportController::class, 'requestReceiveReport'])->name('request-ivr-call-receive-report');
//         Route::post('ivr-call-receive-report-generate-pdf', [IvrCampaignReportController::class, 'receiveReportGeneratePDF'])->name('ivr-call-receive-report-generate-pdf');

//         //sms usage report
//         Route::get('sms-usages-report', [SmsCampaignReportController::class, 'usageReportSms'])->name('sms-usages-report');
//         Route::post('sms-usages-report', [SmsCampaignReportController::class, 'requestUsageReportSms'])->name('request-sms-usages-report');
//         Route::post('sms-usages-report-pdf', [SmsCampaignReportController::class, 'usageReportSmsPdf'])->name('sms-usages-report-pdf');


//         Route::prefix('ivr-call-analysis-report')->group(function () {
//             //Ivr Call Analysis Report
//             Route::get('stakeholder-wise', [IvrCampaignReportController::class, 'callAnalysisReport'])->name('ivr-call-analysis-report');
//             Route::post('request-ivr-call-analysis-report-stakeholder-wise', [IvrCampaignReportController::class, 'requestCallAnalysisReport'])->name('request-ivr-call-analysis-report');
//             Route::post('ivr-call-analysis-generate-pdf', [IvrCampaignReportController::class, 'callAnalysisReportGeneratePDF'])->name('ivr-call-analysis-generate-pdf');

//             //Ivr Call Analysis Report Area Wise
//             Route::get('area-wise',[IvrCampaignReportController::class, 'callAnalysisReportAreaWise'])->name('ivr-call-analysis-report-area-wise');
//             Route::post('request-ivr-call-analysis-report-area-wise', [IvrCampaignReportController::class, 'requestCallAnalysisReportAreaWise'])->name('request-ivr-call-analysis-report-area-wise');
//             Route::post('ivr-call-analysis-area-wise-generate-pdf',[IvrCampaignReportController::class, 'callAnalysisReportAreaWiseGeneratePDF'])->name('ivr-call-analysis-area-wise-generate-pdf');
//         });


//         //Ivr Content Play Report
//         Route::get('ivr-content-play-report', [IvrCampaignReportController::class, 'contentPlayReport'])->name('ivr-content-play-report');
//         Route::post('request-ivr-content-play-report', [IvrCampaignReportController::class, 'requestContentPlayReport'])->name('request-ivr-content-play-report');
//         Route::post('ivr-content-play-report-generate-pdf', [IvrCampaignReportController::class, 'contentPlayReportGeneratePDF'])->name('ivr-content-play-report-generate-pdf');

//         //Ivr Most Favourite Content Play Report
//         Route::get('ivr-most-favourite-content-play-report', [IvrCampaignReportController::class, 'mostFavouritecontentPlayReport'])->name('ivr-most-favourite-content-play-report');
//         Route::post('request-ivr-most-favourite-content-play-report', [IvrCampaignReportController::class, 'requestMostFavouriteContentPlayReport'])->name('request-ivr-most-favourite-content-play-report');
//         Route::post('ivr-most-favourite-content-play-report-generate-pdf', [IvrCampaignReportController::class, 'mostFavouriteContentPlayReportGeneratePDF'])->name('ivr-most-favourite-content-play-report-generate-pdf');
//     });

//     Route::prefix('monthly-summary-Report')->group(function () {
//         //Monthly Summery Report
//         Route::get('generate-body', [MonthlySummaryReportController::class, 'createGenerateBody'])->name('monthly-summary-report-generate-body');
//         Route::post('generate-body', [MonthlySummaryReportController::class, 'requestCreateGenerateBody'])->name('request-monthly-summary-report-generate-body');
//         Route::get('infography-generator', [MonthlySummaryReportController::class, 'createInfographyGenerator'])->name('monthly-summary-report-infography-generator');
//         Route::post('infography-generator', [MonthlySummaryReportController::class, 'requestCreateInfographyGenerator'])->name('request-monthly-summary-report-infography-generator');
//     });


//     //List Report Module
//     Route::prefix('list-reports')->group(function () {
//         //Target Audience report
//         Route::get('ivr-target-audience-report', [IvrListReportController::class, 'ivrTargetAudienceReport'])->name('ivr-target-audience-report');
//         //inboud voice call report
//         Route::get('inbound-voice-call-report', [InboundVoiceCallController::class, 'inboundVoiceCallReport'])->name('inbound-voice-call-report');

//         //sms usage report 
//         Route::get('sms-usage-report-campaign', [SmsListReportController::class, 'usageReportSmsCampaign'])->name('sms-usages-report-campaign');
//         Route::get('sms-campaign-list-reports/{id}', [SmsListReportController::class, 'list_view'])->name('sms-campaign-list-report');
        
//         //Outbound IVR Campaign Report
//         Route::get('outbound-ivr-campaign-report', [IvrListReportController::class, 'outboundIvrCampaignReport'])->name('outbound-ivr-campaign-report');
//         Route::get('outbound-ivr-campaign-report-details/{id}', [IvrListReportController::class, 'outboundIvrCampaignReportDetails'])->name('outbound-ivr-campaign-report-details');

//         //inboud voice call unregister report
//         Route::get('inbound-voice-call-unregistered-report', [InboundVoiceCallController::class, 'inboundVoiceCallUnregisteredReport'])->name('inbound-voice-call-unregistered-report');
 
//     });
// });

