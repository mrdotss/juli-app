<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ClientController;

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

// Landing
Route::get('/', [LandingController::class, 'show'])
            ->name('welcome');

Route::group(['middleware' => ['auth', 'verified']], function () {

    // Client info 
    // Route::get('/user/client/asd', [InfoController::class, 'storeBegin'])
    //             ->name('storeBegin');
    Route::post('/user/client/storeCity', [InfoController::class, 'storeCity'])
                ->name('storeCity');
    Route::post('/user/client/storeCity/storeDistrict', [InfoController::class, 'storeDistrict'])
                ->name('storeDistrict');
    Route::post('/user/client/storeCity/storeDistrict/storeVillage', [InfoController::class, 'storeVillage'])
                ->name('storeVillage');

    // Client Core
    Route::resource('/user/client', 'ClientController');

    //Export client
    Route::get('/getOreClients/export', 'ClientController@export')->name('client.export');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})  ->name('dashboard');