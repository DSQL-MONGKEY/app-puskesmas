<?php

use App\Http\Controllers\User\Auth\UserAuthController;
use App\Http\Controllers\User\Queue\UserQueueController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
// Auth
Route::controller(UserAuthController::class)->prefix('/auth')->group(function(){
    Route::get('/login','showLogin')->name('login');
    Route::post('/login','login');
    Route::get('/register','showRegister');
    Route::post('/register','register');
    Route::post('/logout','logout');
});
// Queue
Route::controller(UserQueueController::class)->prefix('/queue')->group(function(){
    Route::get('/','index');
    Route::get('/add','create');
    Route::post('/add','store');
});

