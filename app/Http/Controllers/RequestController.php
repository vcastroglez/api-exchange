<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{


    private RequestService $service;

    public function __construct()
    {
        $this->service = new RequestService();
    }

    public function index($id){
        return response()->json(['success' => true, 'item' => \App\Models\Request::with('collection')->find($id)]);
    }

    public function store(Request $request){
        return response()->json(['success' => true, 'item' => $this->service->createRequest($request->collection_id,$request->name)]);
    }
}
