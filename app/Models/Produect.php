<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produect extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'brand_id',
        'is_trendy',
        'is_available',
        'price',
        'amount',
        'discount',
        'image'
    ];
    public function catagory(){

       
        return $this->belongsTo(Category::class,'category_id');
    

}

    use HasFactory;
}
