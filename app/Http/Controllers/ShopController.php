<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Wishlist;
use Illuminate\Http\Request;

use Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $wishlist = [];
        $auth = Auth::user();
        $products = Product::latest();

        if ($request->has('category')) {
            $products->where('category_id', $request->get('category'));
        }

        if ($auth != null) {
            $wishlist = Wishlist::where('user_id', $auth->id)
                ->select('product_id')
                ->get()
                ->pluck('product_id');
        }

        $products = $products->paginate(10);

        $categories = Category::where("status", "product")->get();
        return view("shops.index", [
            "products" => $products,
            "categories" => $categories,
            "wishlist" => $wishlist
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $reviews = Review::where('product_id', $product->id)->with('user')->get();
        return view("shops.show", [
            'reviews' => $reviews,
            "product" => $product,
        ]);
    }

    /**
     * Add to cart
     */

    public function addToCart(Product $product)
    {
        $cart = session()->get("cart");

        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $product->id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->photo,
                ],
            ];

            session()->put("cart", $cart);

            return redirect()
                ->back()
                ->with("success", "Product added to cart successfully!");
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$product->id])) {
            $cart[$product->id]["quantity"]++;

            session()->put("cart", $cart);

            return redirect()
                ->back()
                ->with("success", "Product added to cart successfully!");
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$product->id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
        ];

        session()->put("cart", $cart);

        return redirect()
            ->back()
            ->with("success", "Product added to cart successfully!");
    }
}
