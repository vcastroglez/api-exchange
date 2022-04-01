<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VariableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Mail;
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
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/testMail',function(Request $request){
        $mail = $request->mail;
        Mail::send('emails.mail', ['mail' => $mail, 'password' => '123', 'from' => 'API Exchange'], function($message) use ($mail) {
            $message->to($mail, $mail)->subject('Share collection');
            $message->from('copy.session@gmail.com', 'Vla mailer');
        });
    });
    //USER
    Route::post('/change-pass',[UsersController::class,'changePass']);
    //COLLECTIONS
    Route::get('/get-collections', [CollectionController::class, 'index']);
    Route::post('/rename-collection/{id}', [CollectionController::class, 'rename']);
    Route::post('/create-collection', [CollectionController::class, 'store']);
    Route::delete('/delete-collection/{id}', [CollectionController::class, 'delete']);
    Route::post('/share-collection/{id}', [CollectionController::class, 'share']);
    Route::post('/import-collection', [CollectionController::class, 'import']);

    //VARIABLES
    Route::get('/get-variables/{id}', [VariableController::class, 'index']);
    Route::post('/save-variables/{id}', [VariableController::class, 'update']);

    //REQUEST
    Route::post('/create-request', [RequestController::class, 'store']);
    Route::post('/save-request', [RequestController::class, 'save']);
    Route::post('/rename-request/{id}', [RequestController::class, 'rename']);
    Route::post('/send-request', [RequestController::class, 'sendRequest']);
    Route::delete('/delete-request/{id}', [RequestController::class, 'delete']);
    Route::get('/get-request/{id}', [RequestController::class, 'index']);

    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('{path}', function (Request $request) {
        $user = $request->user();
        return view('vueApp')->with('user', $user->toArray());
    })->where('path', '([A-z\d\-\/_.]+)?')->name('vue.index');
});


