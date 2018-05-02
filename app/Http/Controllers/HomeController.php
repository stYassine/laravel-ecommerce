<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $products =Product::all();
        
        return view('index')->with('products', $products);
    }
    
    public function single($id){
        
        $product =Product::find($id);
        
        return view('single')->with('product', $product);
        
    }
    
    public function cart(){
        return view('cart');
    }
    
    public function checkout(){
        return view('checkout');
    }
    
    
    
}
