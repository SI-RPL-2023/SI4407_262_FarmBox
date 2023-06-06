<?php

namespace App\Http\Controllers;

use Auth;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Product $product)
    {
        return view('komentar', ['product' => $product, 'isReview' => true]);
    }

    public function store(Request $request, Product $product)
    {
        $userId = Auth::user()->id;
        $validateData = $request->validate([
            "rating" => "required|numeric",
            "commentar" => "required",
        ]);

        Review::create(array_merge([
            'user_id' => $userId,
            'product_id' => $product->id
        ], $validateData));

        $avergeRating = Review::select('rating')->where('product_id', $product->id)->get()->average('rating');

        $product->rating = $avergeRating;
        $product->save();


        return redirect(route('shop.show', $product));
    }
}
