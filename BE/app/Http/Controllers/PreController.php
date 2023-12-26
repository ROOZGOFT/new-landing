<?php

namespace App\Http\Controllers;

use App\Models\Pre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PreController extends Controller
{
    public function pre_register(Request $request){
        $validator = Validator::make($request->all() , [
            'mobile'=>'required|string|min:11'
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false , 'message'=>$validator->messages()]);
        }
        $mobile = Pre::create([
            'mobile'=>$request->mobile
        ]);
        if(!$mobile){
            return response()->json(['status'=>false , 'message'=>'could not save']);
        }else{
            return response()->json(['status'=>true , 'message'=>'done']);
        }

    }
}
