<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $product=Product::all();
        return view('frontend.guestIndex', compact('product'));
    }

    public function product_search(Request $request)
    {
        $search= $request->input('search');
        $product=Product:: where('product', 'LIKE', '%'.$search.'%')->get();
        return view('frontend.guestIndex',compact('product'));

    }

   

    
}
