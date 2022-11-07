<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
           $data = User::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = ' <a class="btn btn-sm btn-success edit-item-btn" href="">Edit</a>
                           
                           <form method= "POST" action="">
                           ' . csrf_field() . '
                           <input name="_method" type="hidden" value="DELETE">

                           <button type="submit" id="delete-user"
                           class="btn btn-sm btn-danger remove-item-btn show_confirm"
                           data-toggle="tooltip" title="Delete">Delete</button>

                           </form>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.index');
    }
}
