<?php

namespace App\Http\Controllers;

use App\Models\Shared;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CollectionService extends Controller
{
    //
    public function checkIfUserExist($mail)
    {
        $user = User::where('email',$mail)->first();
        $password = null;
        if(empty($user)){
            $user = new User();
            $user->name = explode('@',$mail)[0];
            $user->email = $mail;
            $password = Str::random(8);
            $user->password = Hash::make($password);
            $user->save();
        }
        return $password;
    }

    public function shareCollection($collection_id,$user_mail,$from,$password = null){
        $user = User::where('email',$user_mail)->first();
        $already = Shared::where('collection_id',$collection_id)->where('user_id',$user->id)->first();
        if(!empty($already)) return false;

        Shared::create([
            'collection_id'=>$collection_id,
            'user_id'=>$user->id
        ]);

        Mail::send('emails.mail', ['mail'=>$user_mail,'password'=>$password, 'from'=>$from], function ($message) use ($user_mail) {
            $message->to($user_mail, $user_mail)
                ->subject('Share collection');
            $message->from('copy.session@gmail.com', 'Vla mailer');
        });

        return true;
    }
}
