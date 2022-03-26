<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{

    private CollectionService $service;

    public function __construct()
    {
        $this->service = new CollectionService();
    }

    public function index(Request $request){
        return response()->json(['success' => true, 'items' => Collection::where('user_id',$request->user()->id)->with('requests')->get()]);
    }

    public function store(Request $request){
        Collection::create([
           'user_id'=>$request->user()->id,
           'name'=>$request->name
        ]);
        return response()->json(['success' => true]);
    }

    public function delete($id){
        return response()->json(['success' => true, 'msg' => Collection::find($id)->delete()]);
    }
}
