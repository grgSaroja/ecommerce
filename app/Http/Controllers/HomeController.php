<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product=Product::all();
        return view('frontend.index', compact('product'));
    }

    public function product_search(Request $request)
    {
        $search= $request->input('search');
        $product=Product:: where('product', 'LIKE', '%'.$search.'%')->get();
        return view('frontend.index',compact('product'));

    }

    public function edit_profile($id)
    {
        $data=User::findOrFail($id);
        return view('frontend.profile-edit', compact('data'));
    }

    public function update_profile(Request $request, $id){
        $data=User::findOrFail($id);

        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->address = $request->address;
        $data->number = $request->number;
        $data->save();
        
        return redirect()->back();
    }
}
