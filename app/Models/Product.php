<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='product';
    protected $timestamp=false;
    protected $fillable=[
        'product',
        'description',
        'stock',
        'price', 
        'size',
        'image'
        
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function cartProduct()
    {
        return $this->hasMany(cartProduct::class);
    }
}
