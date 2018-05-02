<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use Cart;

class ShoppingController extends Controller
{
    
    
    public function add(Request $request){
        
        $product =Product::find($request->product_id);
        
        $item =Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => $request->qty
        ]);
        
        Cart::associate($item->rowId, 'App\Product');
        
        return redirect()->route('cart');
        
    }
    
    public function rapid_add($id){
        
        $product =Product::find($id);
        
        $item =Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => 1
        ]);
        
        Cart::associate($item->rowId, 'App\Product');
        
        return redirect()->back();
        
    }
    
    
    
    public function increase($id, $qty){
        
        Cart::update($id, $qty + 1);   
        
        return redirect()->route('cart');
        
    }
    
    public function decrease($id, $qty){
        
        Cart::update($id, $qty - 1);   
        
        return redirect()->route('cart');
    }
    
    public function remove($id){
        
        Cart::remove($id);
        
        return redirect()->back();
        
    }
    
    
    
    
    
}
