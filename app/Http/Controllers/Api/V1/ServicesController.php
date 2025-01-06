<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\ServiceRequest;
use App\Http\Resources\V1\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::query()
            ->when(\request()->input('search'), function ($query, $search){
                $query->where('name', 'LIKE', "%{$search}%");
            })->orderBy(\request()->input('orderBy') ?? 'id', \request()->input('sortBy') ?? 'DESC')
            ->paginate(\request()->input('perPage') ?? 15)
            ->withQueryString();

        return ServiceResource::collection($services);
    }

    public function store(ServiceRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);
        if ($image = $request->file('image')) {
            $data['image'] = '/images/' . $image->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());
        }
        $service = Service::query()->create($data);
        return ServiceResource::make($service);
    }

    public function show($id)
    {
        $service = Service::query()->findOrFail($id);

        return ServiceResource::make($service);
    }

    public function update(Request $request, string $id)
    {
        $service = Service::query()->findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string',
            'slug' => 'nullable',
            'icon' => 'nullable',
            'image' => 'nullable|image',
            'order_number' => 'required|integer',
            'description' => 'nullable',
        ]);

        $data['slug'] = Str::slug($data['name']);
        if ($image = $request->file('image')) {
            $data['image'] = '/images/' . $image->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());
        }
        $service->update($data);

        return ServiceResource::make($service);
    }
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        if(Storage::disk('public')->exists("uploads/$service->image")){
            Storage::disk('public')->delete("services/$service->image");
        }
        $service->delete();
        return Response::HTTP_OK;
    }
}
