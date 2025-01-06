<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TrendingResource;
use Illuminate\Http\Request;
use App\Models\Trending;
use Symfony\Component\HttpFoundation\Response;

class TrendingController extends Controller
{
    public function index()
    {
        $sliders = Trending::query()->orderBy('order_number')->get();

        return TrendingResource::collection($sliders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,webp|max:2048',
            'url' => 'nullable|string',
            'order_number' => 'required|integer',
        ]);

        if ($image = $request->file('image')) {
            $data['image'] = '/images/' . $image->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());
        }
        $slider = Trending::query()->create($data);

        return TrendingResource::make($slider);
    }

    public function update(Request $request, string $id)
    {
        $slider = Trending::query()->findOrFail($id);
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'url' => 'nullable|url',
            'order_number' => 'required|integer',
        ]);

        if ($image = $request->file('image')) {
            $data['image'] = '/images/' . $image->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());
        }
        $slider->update($data);

        return TrendingResource::make($slider);
    }
    public function destroy(string $id)
    {
        $slider = Trending::query()->findOrFail($id);
        $slider->delete();

        return Response::HTTP_OK;
    }
}
