<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\orderMail;
use App\Models\Cart;
use App\Models\cartProduct;
use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class CheckoutController extends Controller
{
    public function index(){
        
        $cartProduct= cart::with(['product'=>function($q){
                        $q->select('*');
                    }])->orderby('id')->where('user_id', auth()->user()->id)->get()->toArray();
       // dd($cartProduct);

        //  foreach ($cartProduct as $cart){
        //             foreach ($cart['product'] as $prod){
        //                 dd($prod);

        //             }
        //         }

        return view('frontend.checkout',compact('cartProduct'));
    }

    public function checkout(){
        
                $cartProduct= cart::with(['product'=>function($q){
                    $q->select('*');
                }])->orderby('id')->where('user_id', auth()->user()->id)->get()->toArray();
        
                // $cart= cart::where('user_id', auth()->user()->id)->get();
                // foreach ($cart as $carts){
                //     dd($carts->id);

                // }
                // foreach ($cartProduct as $cart){
                //     foreach ($cart['product'] as $prod){
                //         dd($prod['cart_id']);

                //     }
                // }

                // foreach ($cartProduct as $cart){
                // //    dd( $cart);
                //     foreach ($cart['product'] as $prod){
        
                //         if($prod['stock']< $prod['quantity'] ){
                //             $_SESSION['message'] == 'not stock Exist';
        
                //         }
                //     }
                // }
                       foreach ($cartProduct as $cart){
                     foreach ($cart['product'] as $prod){
                        $ticketInfo = explode('-', $prod['quantity']);
                        $total=$ticketInfo[0] * $prod['price'];
                            order::create([
                            'user_id'=> auth()->id(),
                            'total'=>$total,
                            'quantity'=> $prod['quantity']
                            ]);

                            cartProduct::where('product_id', $prod['product_id'])->delete();
                            cart::where('id', $prod['cart_id'])->delete();

                        }
                    }

                    $orders = User::all(); 
                    // Mail::send('notification.orderPlaced', new orderPlacedNotification($admin));
                    Mail::to('saroja.grg33@gmail.com')->send(new orderMail($orders));

        
                return redirect(route('cart'));
        
        
            }
}


