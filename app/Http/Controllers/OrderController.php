<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create()
    {
        $products = Cart::where('customer_id', Auth::user()->id)->get();
        // dd($products);
        $unavailableProduct = [];
        foreach ($products as $product) {
            $productData = Product::findOrFail($product->product_id);
            // $productlist[] = $productData->quantity;
            if($productData->quantity < $product->product_quantity)
            {
                $unavailableProduct[] = $product->product_id;
            }
            // $availableQuantity[] = $productData->quantity;
        }
        // dd($unavailableProduct);
        if (count($unavailableProduct)==0) {
            return view('orders.create', compact('products'));
        }
        $unavailableProductList = implode(", ",$unavailableProduct);
        $count = count($unavailableProduct);
        if($count == 1)
        {
        return back()->with('error', 'Sorry, The available product with id ' . $unavailableProductList . ' is less than your order request. Please check available quantity and try again !');
        }
        return back()->with('error', 'Sorry, The available products with ids ' . $unavailableProductList . ' are less than your order request. Please check available quantity and try again !');
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

        Cart::where('customer_id', Auth::user()->id)->delete();

        return redirect()->route('products.index');
    }

    public function index()
    {
        $orders = Order::paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        //Here in leftJoin ('tableToJoinName','tableToJoinName.PK','=','tableWhereJoiningName.FK of tableToJoinName');
        $myorders = Order::join('products', 'products.id', '=', 'orders.product_id')->where('customer_id', $id)->get(['products.*', 'orders.*', 'orders.created_at as ordered_date', 'products.id as productId']);
        return view('orders.show', compact('myorders'));
    }

    public function cancel()
    {
        return redirect()->route('carts.index');
    }

    public function detail($id)
    {
        $reviews = Review::where('customer_id', '=', Auth::user()->id)->where('product_id', '=', $id)->get();
        // dd($reviews);
        $order = Order::join('products', 'products.id', '=', 'orders.product_id')
            ->where('products.id', '=', $id)
            ->where('orders.customer_id', '=', Auth::user()->id)
            ->select(['products.*', 'orders.*', 'orders.created_at as ordered_date', 'products.id as productId', 'orders.id as orderId'])->first();
        // dd($order);
        $reviewCount = $reviews->count();
        // dd($reviewCount);
        return view('orders.detail', compact('order', 'reviews', 'reviewCount'));
    }

    public function deliver($id)
    {
        $order = Order::where('id',$id)->first();
        // $orders = Order::get();
        $order->status = 'received';
        $order->update();
        return redirect()->route('orders.index');
    }
}
