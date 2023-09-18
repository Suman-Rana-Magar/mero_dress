<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        
        $stocks = Stock::join('products', 'products.id', '=', 'stocks.product_id')->where('status', 'Bought')->select(['products.*', 'stocks.*', 'products.id as productId', 'stocks.id as stockId'])->paginate(10);
        // $stocks->paginate(10);
        return view('stocks.index', compact('stocks'));
    }

    public function show($id)
    {
        // $totalSold = 0;
        // $totalBought =0;
        // dd(Stock::product_id);
        $GetSold = Stock::where('status', 'Sold')->where('product_id', $id);
        $GetBought = Stock::where('status', 'Bought')->where('product_id', $id);

        $totalSold = $GetSold->sum('product_quantity');
        $totalBought = $GetBought->sum('product_quantity');
        $availableQuantity = $totalBought -  $totalSold;

        $totalSoldPrice = $GetSold->sum('total_price');
        $totalBoughtPrice = $GetBought->sum('total_price');
        $balance = $totalSoldPrice - $totalBoughtPrice;

        $stocks = Stock::leftJoin('products', 'products.id', '=', 'stocks.product_id')->where('product_id', $id)->get();
        return view('stocks.show', compact('stocks', 'id', 'availableQuantity', 'balance'));
    }
}
