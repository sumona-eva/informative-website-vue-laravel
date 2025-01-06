<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\SliderResource;
use App\Models\Slider;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::query()->orderBy('order_number')->get();

        return SliderResource::collection($sliders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'url' => 'nullable|string',
            'order_number' => 'required|integer',
            'image' => 'required|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($image = $request->file('image')) {
            $data['image'] = '/images/' . $image->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());
        }
        $slider = Slider::query()->create($data);

        return SliderResource::make($slider);
    }

    public function update(Request $request, string $id)
    {
        $slider = Slider::query()->findOrFail($id);
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

        return SliderResource::make($slider);
    }
    public function destroy(string $id)
    {
        $slider = Slider::query()->findOrFail($id);
        $slider->delete();

        return Response::HTTP_OK;
    }
}
