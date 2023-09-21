<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'keywords' => 'required',
            'category' => 'required',
            'image' => 'required',
            'cost_price' => 'required',
            'selling_price' => 'required',
        ]);

        $product = new Product();
        $product->title = $validate['title'];
        $product->quantity = $validate['quantity'];
        $product->description = $validate['description'];
        $product->keywords = $validate['keywords'];
        $product->category = $validate['category'];
        $product->image = $validate['image'];
        $product->cost_price = $validate['cost_price'];
        $product->selling_price = $validate['selling_price'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'products';
            $file->store($path);
            $url = $path . '/' . $file->hashName();
            $product->image = $url;
        }

        $product->save();
        if ($product->save()) {
            return response()->json([
                'success' => 'Product Created Successfully with details :',
                $product,
            ], 201);
        } else {
            return response()->json([
                'error' => 'Unable to create product !'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'success' => 'Product with id ' . $id . ' founded with details:',
                $product,
            ], 202);
        } else {
            return response()->json([
                'error' => 'Product with id ' . $id . ' doesn\'t exists !',
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {

            $validated = $request->validate([
                'title' => 'required',
                'quantity' => 'required',
                'description' => 'required',
                'keywords' => 'required',
                'category' => 'required',
                'image' => 'required',
                'cost_price' => 'required',
                'selling_price' => 'required',
            ]);            
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

            return response()->json([
                'success' => 'Product with id ' . $id . ' updated successfully',
            ], 200);
        } else {
            return response()->json([
                'error' => 'Product with id ' . $id . ' doesn\'t exist.',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json([
                'success' => 'Product with id ' . $id . ' deleted successfully !',
            ], 202);
        } else {
            return response()->json([
                'error' => 'Unable to find product with id ' . $id,
            ], 404);
        }
    }
}
