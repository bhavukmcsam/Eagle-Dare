<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Api\LoginController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/login',function(){
    // echo 888 ; 
    return view('login') ;
}) ;

// Route::get('/login','App\Http\Controllers\LoginController@loginForm')->name('login');
Route::post('/login','App\Http\Controllers\Api\LoginController@login')->name('login');
Route::get('/register','App\Http\Controllers\Api\LoginController@signupForm')->name('register');
Route::post('/register','App\Http\Controllers\Api\LoginController@postRegisterData');
Route::post('/logout','App\Http\Controllers\Api\LoginController@logout')->name('logout');



Route::post('/post-Customer','App\Http\Controllers\Api\LoginController@storeCustomerdetails')->name('postCustomerdetails');
Route::get('/customer-details','App\Http\Controllers\Api\LoginController@customerDetails')->name('customerDetails');

Route::resource('userDetails', LoginController::class);

// Route::resource('customer', LoginController::class);

Route::get('image-upload', [ LoginController::class, 'imageUpload' ])->name('image.upload');

Route::post('image-upload', [ LoginController::class, 'imageUploadPost' ])->name('image.upload.post');

Route::get('show-images/{id}',[LoginController::class,'showImages'])->name('show-images');

Route::delete('delete-images/{id}',[LoginController::class,'destroyImage'])->name('delete-images');

Route::get('get-link/{id}',[LoginController::class,'getLInk'])->name('get-link');

