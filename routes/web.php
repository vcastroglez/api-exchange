<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\RequestController;
use Illuminate\Http\Request;
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
    //COLLECTIONS
    Route::get('/get-collections',[CollectionController::class,'index']);
    Route::post('/create-collection',[CollectionController::class,'store']);
    Route::delete('/delete-collection/{id}',[CollectionController::class,'delete']);

    //REQUEST
    Route::post('/create-request',[RequestController::class,'store']);
    Route::get('/get-request/{id}',[RequestController::class,'index']);


    Route::get('/logout',[LoginController::class,'logout']);
    Route::get('{path}', function (Request $request) {
        $user = $request->user();
        return view('welcome')->with('user',$user->toArray());
    })->where('path', '([A-z\d\-\/_.]+)?')->name('vue.index');
});


