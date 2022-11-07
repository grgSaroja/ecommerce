<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeProduct;
use App\Http\Requests\updateProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function ($row) {
                        $actionBtn = '<a class="btn btn-sm btn-info"
                        href="' . route('product.show', $row->id) . '">Show</a>

                    <a class="btn btn-sm btn-success edit-item-btn"
                        href="' . route('product.edit', $row->id) . '">Edit</a>

                    <form method="POST" class="d-inline-block" action="' . route('product.destroy', $row->id) . '">
                        ' . csrf_field() . '
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" id="delete-user"
                            class="btn btn-sm btn-danger remove-item-btn show_confirm"
                            data-toggle="tooltip" title="Delete">Delete</button>
                    </form>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('backend.product-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('backend.product.create', compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeProduct $request)
    {
         $category = Category::findOrFail($request->category); 
        // dd($category);
        $data=$request->hasfile('upload_file');
        if($data)
        {
            $file = $request->file('upload_file');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;

           $file_path=$file-> move('images/product/', $filename);
        }

        $category->product()->create([
          'product'=> $request->input('prod_name'),
          'stock'=> $request->input('stock'),
          'price'=> $request->input('price'),
          'description'=> $request->input('description'),
          'image'=> $filename

              ]);

        return redirect()->route('product.index')->with('success','product added successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::findOrFail($id);
        return view('backend.product.read', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Product::findOrFail($id);
        $category=Category::all();

        // $category = Category::with('product')->find($data);
       //dd($category);
        return view('backend.product.edit', compact('data', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateProduct $request, $id)
    {
       $category = Category::findOrFail($request->category);
       // $product = Category::findOrFail($request->category)->product()->where('id', $id)->first(); 
 
        $product = Product::find($id);

        $product->product = $request->prod_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
// dd($product->image);
         $path='images/product/'. $product->image;
        //  dd($path);
        if($request->hasFile('upload_file')){
            if(File::exists($path)){
                File::delete($path);
            }

            $file = $request->file('upload_file');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;

            $file_path=$file->move('images/product/', $filename);
            $product->image = $filename;
        };

       
        $product = $category->product()->save($product );


        return redirect()->route('product.index')->with('success','product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product= Product::findOrFail($id);
        $product->delete();
        unlink('images/product/'.$product->image);

        return redirect()->route('product.index')->with('success','product deleted successfully');

    }
}
