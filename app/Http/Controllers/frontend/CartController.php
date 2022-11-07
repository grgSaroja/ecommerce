<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\cart;
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
    // public function getCartItem(){
    //     if(Auth::check()){
    //         $cartItems= cart::with(['product'=>function($q){
    //             $q->select('*');
    //         }])->orderby('id')->where('user_id', Auth::user()->id)->get()->toArray();
    //     }else{
    //         // $cartItems= cart::with(['product'=>function($q){
    //         //     $q->select('*');
    //         // }])->orderby('id')->where('user_id', Auth::user()->id)->get()->toArray();
    //     }
    // }
    public function cart()
    {
        // $orders = User::all(); 
        // foreach($orders as $order){
        //     dd($order['first_name']);

        // }
//                     $users = User::role('admin')->get(); 
// dd($users['first_name']);
        //$relatedOrders = $order->related_orders->first();
       //$hasUser = cartProduct::has('cart')->find(Auth::user()->id);

    //   dd($datas= Product::with('product')->get());

    //  dd( $cartItems= cart::with(['product'=>function($q){
    //                 $q->select('*');
    //             }])->orderby('id')->where('user_id', Auth::user()->id)->get()->toArray());
    // dd(cartProduct::all());

              $cartItems= cart::with(['product'=>function($q){
                    $q->select('*');
                }])->orderby('id')->where('user_id', Auth::user()->id)->get()->toArray();

        // dd($datas= cart::getCartItem());
      // dd($cartItems= cart::where('user_id', Auth::user()->id));
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
        return response()->json(['status'=>'product updated success']);
                }
                else{
                    return response()->json(['status'=>'product updated success']);
    
                }
        // $cartItems->quantity=$data['quantity'];
        // $cartItems->update();
    //     return response()->json([
    //     'status'=>true,
    //     'view'=>(String)View::make('frontend.shoping-cart')->with(compact('cartItems'))
    // ]);
       }


    //     $product_id= $request->input('id');
    //     $quantity= $request->input('quantity');
    //   //  dd(cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists());

    //       echo "<pre>"; print_r($product_id); die;

    //     if(Auth::check()){
    //         if(cartProduct::where('product_id', $product_id)->where('user_id', Auth::id())->exists()){
    //             $cartItems=cartProduct::where('product_id', $product_id)->where('user_id', Auth::id())->first();
    //             $cartItems->quantity=$quantity;
    //             $cartItems->update();

    //             return response()->json(['status'=>'product updated success']);
    //         }
    //         else{
    //             return response()->json(['status'=>'product updated success']);

    //         }
    //     }
    //}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user=Auth::id();

        if($request->ajax()){
           $data=$request->all();
            $hasUser = User::has('cart')->find(Auth::user()->id);
                   //echo "<pre>"; print_r($hasUser->id); die;
                  
       // if($hasUser){
            cartProduct::where('product_id', $data['productId'])->delete();
            cart::where('id', $data['cartId'])->delete();

      //  }
        //cartProduct::with('product')->where('user_id', Auth::user()->id)->delete();
        // echo "<pre>"; print_r($data); die;
       
        //cart::where('user_id',Auth::user()->id)->delete();
        //cartProduct::where('product_id', $data['productId'])->delete();
        // $cartItems= cart::with(['product'=>function($q){
        //     $q->select('*');
        // }])->orderby('id')->where('user_id', Auth::user()->id)->delete();
       
        return response()->json(['status'=>'product updated success']);
                }
                else{
                    return response()->json(['status'=>'product updated success']);
    
        //         }
    }
}


  
}