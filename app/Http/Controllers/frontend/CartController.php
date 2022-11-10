<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\cartProduct;
use App\Models\order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
session_start();

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function cart()
    {
        $cartItems= Cart::with(['product'=>function($q){
            $q->select('*');
        }])->orderby('id')->where('user_id', Auth::user()->id)->get()->toArray();
       
        return view('frontend.shoping-cart', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->ajax()){
            $data=$request->all();
       // echo "<pre>"; print_r($data); die;
        cartProduct::where('product_id', $data['id'])->update(['quantity'=>$data['quantity']]);

       $cartItems= cart::with(['product'=>function($q){
            $q->select('*');
        }])->orderby('id')->where('user_id', Auth::user()->id)->get();

        return response()->json(['success','product updated success']);
        }
        else{
            return response()->json(['success','product updated success']);
    
                }
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //$user=Auth::id();

        if($request->ajax()){
           $data=$request->all();
            $hasUser = User::has('cart')->find(Auth::user()->id);
                   //echo "<pre>"; print_r($hasUser->id); die;
                  
       // if($hasUser){
            cartProduct::where('product_id', $data['productId'])->delete();
            cart::where('id', $data['cartId'])->delete();

      
             return response()->json(['success','product updated success']);
         }
            else{
                return response()->json(['success','product updated success']);
    
       
    }
}


  
}