<?php

namespace App\Http\User;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class UserController 
{
    public function show()
    {
        $products = Product::all();
        return view('index',['products'=>$products]);
    }
    public function addToCart(Request $request)
    {
       
        if($request->product !== null || $request->qty !== 0){
            $cart = new Cart;
            $cart->product_id = $request->product;
            $cart->qty = $request->qty;
            $cart->save();
            $products = Product::find($request->product);
            $products->stock = $products->stock - $request->qty;
            $products->save();
            // $cartItems=Cart::with('product')->get();
            // return response()->json(['status'=>200,'msg'=>$cartItems]);
            return response()->json(['status'=>200]);
        }else{
            return response()->json(['status'=>401,'msg'=>'Product and quantity required']);
        }
        
    }
    public function getUserCart()
    {
        $cartItems=Cart::with('product')->get();
        return response()->json(['status'=>200,'msg'=>$cartItems]);
    }
    public function deleteUserCart(Request $request)
    {
        $id = $request->query('id');
        $cart = Cart::find($id);
        
        $products = Product::find($cart->product_id);
        $products->stock = $products->stock + $cart->qty;
        $cart->delete();
        $products->save();
        return response()->json(['status'=>200]);
    }
}
