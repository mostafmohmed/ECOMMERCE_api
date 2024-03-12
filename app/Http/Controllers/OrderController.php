<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Loction;
use App\Models\Order;
use App\Models\orderitem;
use App\Models\Produect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
      //  $orders=Order::with('user')->get();
        // if($orders){
        //     foreach($orders as $order ){
        //         foreach($order->item as $order_item ){
        //             $prodect=Produect::where('id',$order_item->produect_id)->pluck('name');
        //             $order_item->  protectName=$prodect['0'];
                  
        //         }
        //     }
        //   //  return response()->json($orders,200);
        // }
         return response()->json("xxddddddx");
    }
    public function show($id){
        $order=Order::find($id);
        return response()->json( $order,200);
    }
    public function store(Request $request){
        $loction=Loction::where('user_id',Auth::id())->first();
        // 'user_id','loction_id','status','data of delevery'
$order= new Order();
$order->user_id=Auth::id();
$order->total_price=$request->total_price;
$order->loction_id=$loction->id;
$order->status=$request->status;
$order->data_of_delevery=$request->data_of_delevery;
$order->save();
foreach($request->order_item as $item ){
    $orderit= new orderitem();
    $orderit->order_id=$order->id;
    $orderit-> produect_id=$item['produect_id'];
    $orderit-> price=$item['price'];
    $orderit-> qty=$item['qty'];
    $orderit->save();
    $prodect=Produect::where('id',$item['produect_id'])->first();
    $prodect->  amount -=$item['qty'];
    $orderit->save();
    return response()->json("order is add",201);
    

}
    }

}
