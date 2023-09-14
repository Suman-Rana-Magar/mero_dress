<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        // $cateogires = CATE::pluck("id","name");
        $categories = Category::get();
        return view("products.create", compact("categories"));
    }

    public function index()
    {
        $products = Product::get()->shuffle();
        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $validated =  $request->validate([
            'title' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'keywords' => 'required',
            'category' => 'required',
            'image' => 'required|file',
            'cost_price' => 'required',
            'selling_price' => 'required',
        ]);

        $product = new Product();
        $product->title = $validated['title'];
        $product->quantity = $validated['quantity'];
        $product->description = $validated['description'];
        $product->keywords = $validated['keywords'];
        $product->category = $validated['category'];
        $product->image = $validated['image'];
        $product->cost_price = $validated['cost_price'];
        $product->selling_price = $validated['selling_price'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = "products";
            // $fileName = time() . '_' . $file->getClientOriginalName();
            $file->store($path);
            $url = $path . '/' . $file->hashName();

            $product->image = $url;
        }
        $product->save();

        $stock = new Stock();
        $stock->product_id = $product->id;
        $stock->product_name = $validated['title'];
        $stock->product_quantity = $validated['quantity'];
        $stock->per_price = $validated['cost_price'];
        $stock->total_price = ($validated['quantity'] * $validated['cost_price']);
        $stock->status = 'Bought';
        $stock->save();

        return redirect()->route('products.create')->with('success', 'Product Added Successfully');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $categories = Category::get();
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'keywords' => 'required',
            'category' => 'required',
            'image' => 'required|file|mimes:jpg,png,jpeg,gif,svg|max:1024',
            'cost_price' => 'required',
            'selling_price' => 'required',
        ]);
        $product = Product::findOrFail($id);
        $product->title = $validated['title'];
        $product->quantity = $validated['quantity'];
        $product->description = $validated['description'];
        $product->keywords = $validated['keywords'];
        $product->category = $validated['category'];
        $product->image = $validated['image'];
        $product->cost_price = $validated['cost_price'];
        $product->selling_price = $validated['selling_price'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = "products";
            // $fileName = time() . '_' . $file->getClientOriginalName();
            $file->store($path);
            $url = $path . '/' . $file->hashName();

            $product->image = $url;
        }
        $product->update();
        //return redirect("/products")       
        return redirect()->route('admin.products');
    }

    public function destroy($id)
    {
        $product = Product::where('id',"$id")->first();
        if ($product) {
            $product->delete();
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.index');
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $searchedProducts = Product::where('keywords','LIKE',"%$search%")->orWhere('title','LIKE',"%$search%")->get()->shuffle();
        return view('products.search',compact('searchedProducts'));
    }
}
