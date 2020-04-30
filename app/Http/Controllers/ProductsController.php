<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\OrderItem as Cart;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        return view('products.index',compact('products'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
 
        $cart = Cart::where('product_id',$id)->first();

        // if cart is empty then this the first product
        if(!$cart) {
            $this->saveToCart($product);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        } else {
 
            $cart->qty += 1;
            $cart->save();

            return redirect()->back()->with('success', 'Product added to cart successfully!');
 
        }
 
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function saveToCart($data)
    {
        $newCart = new Cart();

        $newCart->product_id = $data->id;
        $newCart->qty = 1;
        $newCart->price = $data->price;

        $newCart->save();
    }
}
