<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminBlogController extends Controller
{

    public function index(Request $request)
    {

        $blogs = Blog::latest()->limit(30)->get();
        return view("blog.admin", [
            'blogs' => $blogs
        ]);
    }

    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "title" => "required",
            "text" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,webp,svg|max:2048",
        ]);
        $validateData["slug"] = Str::slug(
            $request->title
        );
        if ($request->file("image")) {
            $validateData["image"] = $request
                ->file("image")
                ->store("blog-images");
        }

        Blog::create($validateData);
        return redirect()
            ->route("admin-blog.index")
            ->with("success", "Blog created successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        if ($blog->image) {
            Storage::delete($blog->image);
        }
        $blog->delete();
        return redirect()
            ->route("admin-blog.index")
            ->with("success", "Blog deleted successfully.");
    }
}
