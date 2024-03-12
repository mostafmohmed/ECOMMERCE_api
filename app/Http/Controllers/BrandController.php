<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\brand as RequestsBrand;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brand=Brand::paginate(3);
        return ApiResponse::sendResponse(200,'sucsess',$brand);
    }
    public function show($id){
        $brand=Brand::find($id);
        if($brand){ return ApiResponse::sendResponse(200,'sucsess',$brand);}
       
    else

     return ApiResponse::sendResponse(200,'brand not found');
}



public function store(RequestsBrand $request){
    // $brand=Brand::find($id);
    $data=$request->validated();
    $recourd= Brand::create($data);
if( $recourd){
return ApiResponse::sendResponse(201,'the brand created',[] );
}
 
}





public function update($id,RequestsBrand $request){
    // $brand=Brand::find($id);
    try{
        $data=$request->validated();
        Brand::where('id',$id)->update(['name'=>$request->name]);
    
        return ApiResponse::sendResponse(200,'the brand update',[] );
    }catch(Exception $e){
        return ApiResponse::sendResponse(500,$e,[] );
    }
  
}
public function delete($id){
    // $brand=Brand::find($id);
    $brand=Brand::find($id);
    if($brand)
    {
        $brand->delete();
        return ApiResponse::sendResponse(200,'the brand delet',[] );
    }
   
else 
return ApiResponse::sendResponse(200,'the brand notfound',[] );


}




}





