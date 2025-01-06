<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\PackageRequest;
use App\Http\Resources\V1\PackageResource;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index()
    {
        $package = Package::query()->latest()->get();

        return PackageResource::collection($package);
    }

    public function store(PackageRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $data['sub_titles'] = json_encode($data['sub_titles']);
        $data['items'] = json_encode($data['items'] ?? []);
        $package = Package::query()->create($data);

        return PackageResource::make($package);
    }
    public function show($slug)
    {
       $package = Package::query()->where('slug', $slug)->firstOrFail();
       return PackageResource::make($package);
    }
    public function update(PackageRequest $request, string $slug)
    {
        $package = Package::query()->where('slug',$slug)->first();
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $data['sub_titles'] = json_encode($data['sub_titles']);
        $data['items'] = json_encode($data['items'] ?? []);

        $package->update($data);
        return PackageResource::make($package);
    }

    public function destroy(string $id)
    {
        $package = Package::query()->findOrFail($id);
        $package->delete();

        return Response::HTTP_OK;
    }
}
