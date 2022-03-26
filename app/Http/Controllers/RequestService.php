<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestService extends Controller
{
    //
    public function createRequest($collection_id, $name)
    {
        return \App\Models\Request::create([
           'collection_id'=>$collection_id,
           'name'=>$name
        ]);
    }
}
