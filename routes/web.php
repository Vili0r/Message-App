<?php

use App\Http\Controllers\ChatGroupController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\ChatMessage;
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


Route::group(['middleware' => 'auth', 'verified'], function(){

    //Users Controller
    Route::resource('users', UserController::class);
    //ChatGroup Controller
    Route::resource('chatgroups', ChatGroupController::class);
    //Messages
    Route::get('messages', ChatMessage::class);
});