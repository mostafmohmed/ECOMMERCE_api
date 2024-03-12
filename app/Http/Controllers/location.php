<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\loctionrequest;
use App\Models\Loction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class location extends Controller
{
    public function create(loctionrequest $request){
        $data=$request->validated();
        if(Auth::check()){
            Loction::create(
                [
                    'area'=>  $data['area'],
    
                         'street'=>  $data['street'],
                             'building'=>  $data['building'],
                                 'user_id'=>  Auth::id()
                ]
            );
            return response()->json( "sucess");
        }
       

    }
}
