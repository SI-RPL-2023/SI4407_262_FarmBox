<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(30);
        return view('blog.index', [
            'blogs' => $blogs
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blog.show', ['blog' => $blog]);
    }
}
