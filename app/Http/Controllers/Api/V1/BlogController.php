<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\BlogRquest;
use App\Http\Resources\V1\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::query()->select('title', 'slug', 'image','id')->latest()->get();

        return BlogResource::collection($blogs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRquest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        if ($image = $request->file('image')) {
            $data['image'] = '/images/' . $image->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());
        }
        $blog = Blog::query()->create($data);

        return BlogResource::make($blog);
    }

    public function show($id)
    {
        $blog = Blog::query()->findOrFail($id);
        return BlogResource::make($blog);
    }

    public function update(BlogRquest $request, string $id)
    {
        $blog = Blog::query()->findOrFail($id);
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        if ($image = $request->file('image')) {
            $data['image'] = '/images/' . $image->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());
        }
        $blog->update($data);

        return BlogResource::make($blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::query()->findOrFail($id);
        $blog->delete();
    }
}
