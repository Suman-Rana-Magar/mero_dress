<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create()
    {
        $products = Cart::where('customer_id', Auth::user()->id)->get();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required',
        ]);
        $items = Cart::where('customer_id', Auth::user()->id)->get();
        foreach ($items as $item) {
            $order = new Order();
            $order->customer_id = $item->customer_id;
            $order->product_id = $item->product_id;
            $order->product_quantity = $item->product_quantity;
            $order->per_price = $item->per_price;
            $order->total_price = $item->total_price;
            $order->shipping_address = $validated['address'];

            //updating product quantity in product table
            $productGet = Product::findOrFail($item->product_id);
            $productGet->quantity -= $item->product_quantity;
            $productGet->update();

            $order->save();

            $stock = new Stock();
            $stock->customer_id = $item->customer_id;
            $stock->product_id = $item->product_id;
            $stock->product_quantity = $item->product_quantity;
            $stock->per_price = $item->per_price;
            $stock->total_price = $item->total_price;
            $stock->status = 'Sold';
            $stock->save();
        }

        Cart::where('customer_id',Auth::user()->id)->delete();

        return redirect()->route('products.index');
    }

    public function index()
    {
        $orders = Order::paginate(10);
        return view('orders.index',compact('orders'));
    }

    public function show($id)
    {
        //Here in leftJoin ('tableToJoinName','tableToJoinName.PK','=','tableWhereJoiningName.FK of tableToJoinName');
        $myorders = Order::join('products','products.id','=','orders.product_id')->where('customer_id',$id)->get();
        return view('orders.show',compact('myorders'));
    }

    public function cancel()
    {
        return redirect()->route('carts.index');
    }
}
