<?php

namespace App\Http\Controllers\Api\Frontend\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PackageResource;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
  
    public function index()
    {
        $packages = Package::query()->latest('id')->get();

        return PackageResource::collection($packages);
    }
    public function show(string $slug)
    {
        $package = Package::query()->where('slug', $slug)->first();

        return PackageResource::make($package);
    }
}
