<?php

namespace App\Http\Controllers;

use App\Models\Variable;
use Illuminate\Http\Request;

class VariableController extends Controller
{
    public function index($id){
        return response()->json(['success' => true, 'variables' => Variable::where('collection_id',$id)->get()]);
    }

    public function update(Request $request, $id){
        foreach ($request->variables as $variable) {
            $var = Variable::where('collection_id',$id)->where('name',$variable['name'])->first();
            if(empty($var)){
                $var = new Variable();
                $var->collection_id = $id;
            }
            $var->name = $variable['name'];
            $var->initial_value = $variable['initial_value'];
            $var->current_value = $variable['current_value'] ?? $variable['initial_value'];
            $var->save();
        }
        return response()->json(['success' => true]);
    }
}
