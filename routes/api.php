<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\LoginController;


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

Route::resource('userDetails', LoginController::class);

Route::post('/login','App\Http\Controllers\Api\LoginController@login')->name('login');

Route::get('/register','App\Http\Controllers\Api\LoginController@signupForm')->name('register');

Route::post('/register','App\Http\Controllers\Api\LoginController@postRegisterData');

Route::post('/logout','App\Http\Controllers\Api\LoginController@logout')->name('logout');

Route::post('/post-Customer','App\Http\Controllers\Api\LoginController@storeCustomerdetails')->name('postCustomerdetails');

Route::get('/customer-details','App\Http\Controllers\LoginController@customerDetails')->name('customerDetails');

Route::post('/create-customer','App\Http\Controllers\Api\LoginController@store')->name('create.customer');

Route::get('image-upload', [ LoginController::class, 'imageUpload' ])->name('image.upload');

Route::post('image-upload', 'App\Http\Controllers\Api\LoginController@imageUploadPost')->name('image.upload.post');

Route::get('show-images/{id}','App\Http\Controllers\Api\LoginController@showImages')->name('show-images');

Route::delete('delete-images/{id}',[LoginController::class,'destroyImage'])->name('delete-images');

