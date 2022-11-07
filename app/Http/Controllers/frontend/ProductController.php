<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\cartProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Helper;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $product=Product::all();
        //dd($product);
        // $product=Product::has('category')->get();

       
        $search_result= $request['search'];
        if($search_result!= ''){
            $product= Product:: where('product', 'LIKE', '%'.$search_result.'%');

            // $product = $product->map(function ($products, $key) {
            //                 return [
            //                             'product' => $products['product'],
            //                             'image' => Helper::catch_first_image($products['image']),
            //                        ];
            //             });          

        }
        else{
            $product= Product::get();

        }

        return view('frontend.product',compact(['product','product']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $product_detail=Product::find($id);
        return view('frontend.modal-details',compact('product_detail'));
    }

    public function addToCart(Request $request)
    {
        $product =$request->all();
        $user=Auth::id();
        //$cart = cart::with('user')->find(Auth::user()->id);
     //dd($cart);

        // $hasUser = User::has('cart')->find(Auth::user()->id);
        // if($hasUser == null){
        //     // if(Auth::check()){
               
        //             $cart = Cart::create([
        //                 'user_id'=>$user,

        //             ]);
        //             session(['cart_id' => $cart->id]);
        //             cartProduct::create([
        //                 'cart_id' => $cart->id,
        //                 'product_id' => $product['product_id'],
        //                 'quantity' => $product['quantity'],

        //             ]);
        //        // }  
        //     } else{
        //         // $cart = Cart::find($user);

        //         cartProduct::create([
        //             'cart_id' => session('cart_id'),
        //             'product_id' => $product['product_id'],
        //             'quantity' => $product['quantity'],
    
        //         ]);
        //     }


       //  $hasUser = User::has('cart')->find(Auth::user()->id);

        // dd( $table= Cart::where('user_id',$user)->get());
      //  if($hasUser){
               
                    $cart = Cart::create([
                        'user_id'=>$user,

                    ]);
                    session(['cart_id' => $cart->id]);
                    cartProduct::create([
                        'cart_id' => $cart->id,
                        'product_id' => $product['product_id'],
                        'quantity' => $product['quantity'],

                    ]);
                    return redirect()->back();

               // }  
            
            // else{
            //             $cart = Cart::find($user);
        
            //             cartProduct::create([
            //                 'cart_id' => $cart->id,
            //                 'product_id' => $product['product_id'],
            //                 'quantity' => $product['quantity'],
            
            //             ]);
            //         }

           
  

        // return view('frontend.product',compact('product'));
    }

    public function cart()
    {
        // $product=Product::all();
        $cartItems= cartProduct::all();

        // return view('frontend.shoping-cart', compact($cartItems));
    }


    public function product_search(Request $request)
    {
        $search= $request->input('search');
        $product=Product:: where('product', 'LIKE', '%'.$search.'%')->get();
        return view('frontend.product',compact('product'));

    }


    public function updateCart()
    {
        // $product=Product::all();
        // return view('frontend.product',compact('product'));
    }


    public function destroyCart()
    {
        // $product=Product::all();
        // return view('frontend.product',compact('product'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
