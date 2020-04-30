<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderItem as Cart;
use App\DiscountCode;

class CartsController extends Controller
{
    public function index()
    {
        $carts = Cart::with('products')->get();

        return view('carts.index', compact('carts'));
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = Cart::findOrFail($request->id);
            $cart->qty = $request->quantity;
            $cart->save();

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = Cart::findOrFail($request->id);

            if($cart) {
                $cart->delete();
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function submitDiscount(Request $request)
    {
        $voucher = DiscountCode::where('discount_code', $request->voucher)->first();
        if($voucher)
        {
            $carts = Cart::pluck('id');
            Cart::whereIn('id', $carts)->update(['discount' => $voucher->discount_percentage]);

            session()->flash('success', 'Coupon code has been applied!');
        }else{
            session()->flash('error', 'Invalid coupon code. Please try again.');
        }
    }
}
