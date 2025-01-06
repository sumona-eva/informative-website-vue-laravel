<?php

namespace App\Http\Controllers\Api\Frontend\V1;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::query()
                    ->orderBy('order_number')
                    ->get();

        return response()->json($projects);
    }

    public function singleProject($slug)
    {
        $project = Project::query()
        ->where('slug', $slug)
        ->with('images')
        ->firstOrFail();

        return response()->json($project);
    }
}
