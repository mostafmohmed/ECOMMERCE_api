<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loction extends Model
{
    protected $table="loctions";
    protected $fillable = [
        'area',
        'street',
        
        'building',
        'user_id',
        
    ];
     	 	 	
    use HasFactory;
}
