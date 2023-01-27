<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SubscriptionController;
use App\Models\Subscription;

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

// Auth::routes();

Route::post('/payments/pay' , [PaymentController::class, 'pay'])->name('pay');
Route::get('/payments/approval' , [PaymentController::class , 'approval'])->name('approval');
Route::get('/payments/cancelled' , [PaymentController::class , 'cancelled'])->name('cancelled');

Route::prefix('subsribe')->name('subscribe.')
    ->group(function(){
    Route::get('/' , [SubscriptionController::class , 'show'])->name('show');
    Route::get('/' , [SubscriptionController::class , 'store'])->name('store');
    Route::get('/approval' , [SubscriptionController::class , 'approval'])->name('approval');
    Route::get('/cancelled' , [SubscriptionController::class , 'cancelled'])->name('cancelled');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
