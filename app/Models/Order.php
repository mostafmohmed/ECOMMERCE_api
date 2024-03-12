<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id','loction_id','status','data_of_delevery'
        
    ];


    public function item(){
        return $this->hasMany(orderitem::class,'order_id');
    }



    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


    public function loction(){
        return $this->belongsTo(User::class,'loction_id');
    }
    use HasFactory;
}
