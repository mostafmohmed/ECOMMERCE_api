<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderitem extends Model
{
    protected $fillable = [
        'order_id','produect_id','price','protectName','qty'
        
    ];

    public function produect(){
        return $this->belongsTo(Produect::class,'produect_id');
    }
    use HasFactory;
}
