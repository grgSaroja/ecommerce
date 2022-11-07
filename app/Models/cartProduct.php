<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class cartProduct extends Model
{
    use HasFactory;
    protected $table='cart_product';
    protected $timestamp=false;
    protected $fillable=[
        'cart_id',
        'product_id',
        'quantity'
        
    ];

    
   
}
