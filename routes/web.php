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
use App\Http\Controllers\Backend\CoinAgencyRechargeController;
use App\Http\Controllers\Backend\CoinAgencyCoinSendController;
use App\Http\Controllers\Backend\CoinAgencyRechargeRequestController;
use App\Http\Controllers\Backend\CoinAgencyProfileController;
use App\Http\Controllers\Backend\CoinAgencyCoinSendRequestController;
use App\Http\Controllers\Backend\HostAgencyProfileController;

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

Route::group(['middleware' => ['role:Super Admin|Admin|Coin Agency|Host Agency']], function ()
{ 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['role:Super Admin|Admin']], function ()
{   
    Route::get('roles', [RoleController::class, 'index'])->name('role.index');

    Route::get('user/list', [UsersController::class, 'index'])->name('user.index');
    Route::get('user/create', [UsersController::class, 'create'])->name('user.create');
    Route::post('user/store', [UsersController::class, 'store'])->name('user.store');
    Route::get('user/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
    Route::post('user/update/{id}', [UsersController::class, 'update'])->name('user.update');

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

    Route::get('coin-agency-recharge-request/list', [CoinAgencyRechargeRequestController::class, 'index'])->name('coin-agency-recharge-request-list');
    Route::get('coin-agency-recharge-request/edit/{id}', [CoinAgencyRechargeRequestController::class, 'edit'])->name('coin-agency-recharge-request-edit');
    Route::post('coin-agency-recharge-request/update', [CoinAgencyRechargeRequestController::class, 'update'])->name('coin-agency-recharge-request-update');
    Route::post('coin-agency-recharge-request/delete/{id}', [CoinAgencyRechargeRequestController::class, 'delete'])->name('coin-agency-recharge-request-delete');

    Route::get('coin-agency-coin-send-request/list', [CoinAgencyCoinSendRequestController::class, 'index'])->name('coin-agency-coin-send-request-list');

    Route::get('coin-agency-coin-send-request/edit/{id}', [CoinAgencyCoinSendRequestController::class, 'edit'])->name('coin-agency-coin-send-request-edit');

    Route::post('coin-agency-coin-send-request/update', [CoinAgencyCoinSendRequestController::class, 'update'])->name('coin-agency-coin-send-request-update');

    Route::post('coin-agency-coin-send-request/delete/{id}', [CoinAgencyCoinSendRequestController::class, 'delete'])->name('coin-agency-coin-send-request-delete');

});

Route::group(['middleware' => ['role:Coin Agency']], function ()
{   
    Route::get('/coin-agency-profile', [CoinAgencyProfileController::class, 'profile'])->name('coin-agency-profile');

    Route::get('/coin-agency-recharge/list', [CoinAgencyRechargeController::class, 'index'])->name('coin-agency-recharge-list');
    Route::get('/coin-agency-recharge/create', [CoinAgencyRechargeController::class, 'create'])->name('coin-agency-recharge-create');
    Route::post('/coin-agency-recharge/store', [CoinAgencyRechargeController::class, 'store'])->name('coin-agency-recharge-store');
    Route::get('/coin-agency-recharge/edit/{id}', [CoinAgencyRechargeController::class, 'edit'])->name('coin-agency-recharge-edit');
    Route::post('/coin-agency-recharge/update', [CoinAgencyRechargeController::class, 'update'])->name('coin-agency-recharge-update');
    Route::post('/coin-agency-recharge/delete/{id}', [CoinAgencyRechargeController::class, 'delete'])->name('coin-agency-recharge-delete');

    Route::get('/coin-agency-coin-send/list', [CoinAgencyCoinSendController::class, 'index'])->name('coin-agency-coin-send-list');
    Route::get('/coin-agency-coin-send/create', [CoinAgencyCoinSendController::class, 'create'])->name('coin-agency-coin-send-craete');
    Route::post('/coin-agency-coin-send/store', [CoinAgencyCoinSendController::class, 'store'])->name('coin-agency-coin-send-store');
    Route::get('/coin-agency-coin-send/edit/{id}', [CoinAgencyCoinSendController::class, 'edit'])->name('coin-agency-coin-send-edit');
    Route::post('/coin-agency-coin-send/update', [CoinAgencyCoinSendController::class, 'update'])->name('coin-agency-coin-send-update');
    Route::post('/coin-agency-coin-send/delete/{id}', [CoinAgencyCoinSendController::class, 'delete'])->name('coin-agency-coin-send-delete');
});

Route::group(['middleware' => ['role:Host Agency']], function ()
{ 
    Route::get('/host-agency-profile', [HostAgencyProfileController::class, 'profile'])->name('host-agency-profile');
});