<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function changePass(Request $request){
        $user = $request->user();
        $checkCurrent = Hash::check($request->current,$user->password);
        if(!$checkCurrent) return response()->json(['success' => false, 'msg' => 'Wrong password']);
        $user->password = Hash::make($request->new_pass);
        $user->save();
        return response()->json(['success' => true]);
    }
}
