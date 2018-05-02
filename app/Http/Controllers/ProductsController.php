<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use Session;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =Product::all();
        
        return view('admin.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required|min:2|max:150',
            'price' => 'required|integer',
            'image' => 'required',
            'detail' => 'required|min:2|max:999'
        ]);
        
            
        $image =$request->file('image');
        $image_name =time().$image->getClientOriginalName();
        $image->move('uploads/products', $image_name);
            
        $product =new Product();
        $product->name =$request->name;
        $product->price =$request->price;
        $product->image ='uploads/products/'.$image_name;
        $product->detail =$request->detail;
        $product->save();
        
        Session::flash('product_created', 'Product Created Successfully');
        
        return redirect()->back();
        
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
        
        $product =Product::find($id);
        
        return view('admin.products.edit')->with('product', $product);
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
        
        $this->validate($request, [
            'name' => 'required|min:2|max:150',
            'price' => 'required|integer',
            'detail' => 'required|min:2|max:999'
        ]);    
        
            
        $product =Product::find($id);
        $product->name =$request->name;
        $product->price =$request->price;
        
        if($request->has('image')){
            
            File::delete($product->image);
            
            $image =$request->file('image');
            $image_name =time().$image->getClientOriginalName();
            $image->move('uploads/products', $image_name);
            
            $product->image =$request->image;
            
        }
        
        
        $product->detail =$request->detail;
        $product->save();
        
        Session::flash('product_updated', 'Product Updated Successfully');
        
        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =Product::find($id);
        File::delete($product->image);
        $product->delete();
        
        Session::flash('product_deleted', 'Product Deleted Successfully');
        
        return redirect()->back();
        
    }
    
    
}