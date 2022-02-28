<?php

use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\Dashboard\AdminDashboardController;
use App\Http\Controllers\User\Auth\UserAuthController;
use App\Http\Controllers\User\Queue\UserQueueController;
use App\Models\Queue;
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
// Admin Auth
Route::controller(AdminAuthController::class)->prefix('/auth')->group(function(){
    Route::get('/admin/login', 'showLogin');
    Route::post('/admin/login', 'login');
    Route::post('/admin/logout', 'logout');
});
// Admin Dashboard
Route::controller(AdminDashboardController::class)->prefix('/dashboard')->group(function(){
    Route::get('/','index');
    Route::get('/queue','queue');
    Route::get('/queue/{queue:slug}','showQueue');
});
Route::get('/admin/layouts',function(){
    return view('admin.layouts.app');
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
    Route::get('/coba',function(){
        return json_encode(Queue::first()->datetime);
    });
});

