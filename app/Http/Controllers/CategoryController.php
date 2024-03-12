<?php

namespace App\Http\Controllers;
use Exception;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\catagoryrequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $catagory=Category::paginate(3);
        return ApiResponse::sendResponse(200,'sucsess',$catagory);
    }
    public function show($id){
        $catagory=Category::find($id);
        if($catagory){ return ApiResponse::sendResponse(200,'sucsess',$catagory);}
       
    else

     return ApiResponse::sendResponse(200,'brand not found');
}



public function store(catagoryrequest $request){
    // $brand=Brand::find($id);
    $data=$request->validated();
    $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);
    $recourd= Category::create([
        'name'=>$data['name'],
        'image'=>$fileName,
    ]);
if( $recourd){
return ApiResponse::sendResponse(201,'the brand created',[] );
}
 
}





public function update($id,catagoryrequest $request){
    // $brand=Brand::find($id);
    try{
        $data=$request->validated();
        Category::where('id',$id)->update(['name'=>$request->name]);
    
        return ApiResponse::sendResponse(200,'the brand update',[] );
    }catch(Exception $e){
        return ApiResponse::sendResponse(500,$e,[] );
    }
  
}
public function delete($id){
    // $brand=Brand::find($id);
    $brand=Category::find($id);
    if($brand)
    {
        $brand->delete();
        return ApiResponse::sendResponse(200,'the brand delet',[] );
    }
   
else 
return ApiResponse::sendResponse(200,'the brand notfound',[] );


}
}
