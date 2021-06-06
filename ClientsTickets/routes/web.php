<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TicketController;

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
    return view('auth.login');
});

Route::resource('cliente', ClienteController::class)->middleware('auth');
Route::resource('ticket', TicketController::class)->middleware('auth');



Auth::routes(['reset'=>false]);

Route::get('/home', [ClienteController::class, 'index'])->name('home');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [ClienteController::class, 'index'])->name('home');
});
