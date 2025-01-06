<?php

namespace App\Http\Controllers\Api\Frontend\V1;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::query()->get();

        return response()->json($services);
    }

    public function serviceDetail(string $slug)
    {
        $service = Service::query()->where('slug', $slug)->first();

        return response()->json($service);
    }
}
