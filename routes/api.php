<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');

//route ApiCrud protette
Route::apiResource('/notes', 'Api\NotesController')->middleware('auth:api');


//route per profilo utente protetta
Route::get('/user', 'Api\MyController@user') ->middleware('auth:api');

//route per la verifica
Route::get('/email/resend', 'Api\VerificationController@resend')->name('verification.resend');

//route che dice se verificato o meno
Route::get('/email/verify/{id}/{hash}', 'Api\VerificationController@verify')->name('verification.verify');