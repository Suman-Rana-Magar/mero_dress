<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create($product_id)
    {
        return view('reviews.create',compact('product_id'));
    }

    public function store(Request $request,$product_id)
    {
        $validated = $request->validate([
            'rating' => 'required',
            'comment' => 'required|max: 1500',
        ]);
        $review = new Review();
        $review->customer_id = Auth::user()->id;
        $review->product_id = $product_id;
        $review->rating = $validated['rating'];
        $review->comments = $validated['comment'];

        $review->save();

        return redirect()->route('orders.show',Auth::user()->id)->with('success','Thank You For Your Valuable Review !');
    }

    public function cancel()
    {
        return redirect()->route('orders.show',Auth::user()->id);
    }

    public function update($id)
    {
        $review = Review::findOrFail($id);
        $review->approved = '1';
        $review->update();

        return redirect()->route('admin.review');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.review');
    }
}
