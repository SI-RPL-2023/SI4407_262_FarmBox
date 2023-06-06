<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $featuredProducts = Product::limit(3)->get();
        return view('welcome', ['featuredProducts' => $featuredProducts]);
    }
}
