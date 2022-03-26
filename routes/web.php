<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes(['register' => false]);

Route::group(['middleware'=>'auth'],function(){
    Route::get('/logout',[LoginController::class,'logout']);
    Route::get('{path}', function () {
        return view('welcome');
    })->where('path', '([A-z\d\-\/_.]+)?')->name('vue.index');
});


