<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        if(Auth::user())
        {
            $carts = Cart::where('customer_id',Auth::user()->id)->get();
            return view('carts.index',compact('carts'));
        }
        else
        {
            return view('carts.index');
        }
    }

    public function store(Request $request,$id)
    {
        if(Auth::user())
        {
            $cart = new Cart();
            $cart->customer_id = Auth::user()->id;
            $product = Product::where('id',"$id")->first();
            $cart->product_id = $id;
            $cart->product = $product->title;
            $cart->image = $product->image;
            $cart->product_quantity = $request->quantity;
            $cart->per_price = $product->selling_price;
            $cart->total_price = ($product->selling_price * $request->quantity);
    
            $cart->save();
            return redirect()->route('products.index');
        }
        else
        {
            return back();
        }
        
    }

    public function destroy($id)
    {
        $cart = Cart::where('product_id',"$id")->first();
        if ($cart) {
            $cart->delete();
            return redirect()->route('carts.index');
        } else {
            return redirect()->route('carts.index');
        }
    }
}
