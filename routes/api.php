<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//login
Route::post('/login',[ApiController::class, 'login'])->name("api.login");

//dashboard
// Route::post('/dashboard',[ApiController::class, 'dashboard'])->name("api.dashboard");

//group
Route::group([
    'middleware'=>'auth.jtw',
],function() {
    Route::post('/dashboard', [ApiController::class, 'dashboard']);
    //! put all after login here.
        
});
