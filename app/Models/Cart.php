<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;
    protected $table='cart';
    protected $timestamp=false;
    protected $fillable=[
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    public static function getCartItem(){
        if(Auth::check()){
            $cartItems= cart::with(['product'=>function($q){
                $q->select('*');
            }])->orderby('id')->where('user_id', Auth::user()->id)->get()->toArray();
        }else{
            // $cartItems= cart::with(['product'=>function($q){
            //     $q->select('*');
            // }])->orderby('id')->where('user_id', Auth::user()->id)->get()->toArray();
        }
    }
}
