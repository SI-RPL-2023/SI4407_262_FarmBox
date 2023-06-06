<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

use Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        $wishlist = Wishlist::where('user_id', $auth->id)->with('product')->get()->pluck('product');
        return view('wishlist.index', [
            'products' => $wishlist
        ]);
    }

    public function store(Request $request)
    {
        $auth = Auth::user();
        $validated = $request->validate([
            'product_id' => 'required'
        ]);

        $isExists = Wishlist::where('product_id', $request->product_id)->where('user_id', $auth->id)->first();
        if ($isExists == null) {
            Wishlist::create([
                'user_id' => $auth->id,
                'product_id' => $request->product_id
            ]);
        } else {
            $isExists->delete();
        }

        return redirect()->back();
    }
}
