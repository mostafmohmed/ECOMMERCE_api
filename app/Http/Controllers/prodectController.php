<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\prduectrequest;
use App\Models\Produect;
use Illuminate\Http\Request;

class prodectController extends Controller
{
    public function index(){
        return   response()->json('ccccccccccccccc');
    }
    public function store(prduectrequest $request){
        // return   response()->json('ccccccccccccccc');
        // $brand=Brand::find($id);
        $data=$request->validated();
        $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $fileName);
//          return   response()->json('ccccccccccccccc');
        $recourd= Produect::create([
            'name'=>$data['name'],
            'image'=>$fileName,
// 'is_trendy'=>$data['is_trendy'],

// 'is_available'=>$data['is_available'],

'price'=>$data['price'],
'amount'=>$data['amount'],
'discount'=>$data['discount'],

        //     'name',
        // 'category_id',
        // 'brand_id',
        // 'is_trendy',
        // 'is_available',
        // 'price',
        // 'amount',
        // 'discount',
        // 'image'

        ]);
    if( $recourd){
    return ApiResponse::sendResponse(201,'the brand created',[] );
    }
     
//     }
//     public function show($id){
//         $progect=Produect::find($id);
//         if($progect){ return ApiResponse::sendResponse(200,'sucsess',$progect);}
       
//     else

//      return ApiResponse::sendResponse(200,'brand not found');
 }
 public function show($id){
    $produect=Produect::with('catagory')->
            find($id);
    if($produect){ return ApiResponse::sendResponse(200,'sucsess',$produect);}
   
else

 return ApiResponse::sendResponse(200,'brand not found');
}


}
