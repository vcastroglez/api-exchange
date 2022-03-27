<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Shared;
use Illuminate\Http\Request;

class CollectionController extends Controller
{

    private CollectionService $service;

    public function __construct()
    {
        $this->service = new CollectionService();
    }

    public function share(Request $request, $id){
        $password = $this->service->checkIfUserExist($request->mail);
        $sended = $this->service->shareCollection($id,$request->mail,$request->user()->email,$password);
        return response()->json(['success' => $sended]);
    }

    public function index(Request $request){
        $shared = Shared::where('user_id',$request->user()->id)->get()->pluck('collection_id');
        return response()->json(['success' => true, 'items' => Collection::where('user_id',$request->user()->id)->orWhereIn('id',$shared)->with('requests')->get()]);
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
