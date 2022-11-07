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
     
                           $btn = ' <a class="btn btn-sm btn-success edit-item-btn" href="' . route('user.show', $row->id) . '">Show</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.index');
    }

    public function show( $id){
        $user=User::findOrFail($id);
        return view('backend.users.show',compact('user'));

    }
}
