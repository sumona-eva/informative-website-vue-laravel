<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\CategoryRequest;
use App\Http\Resources\V1\CategoryResource;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProjectCategory::query()->get();

        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $projectCategory = ProjectCategory::query()->create($data);

        return CategoryResource::make($projectCategory);
    }

    public function update(Request $request, string $id)
    {
        $category = ProjectCategory::query()->findOrFail($id);
        $data = $request->validate([
            'name' => 'required|unique:project_categories,name',
            'slug' => 'nullable',
        ]);
        $data['slug'] = Str::slug($data['name']);
        $projectCategory = $category->update($data);

        return CategoryResource::make($category);
    }
    public function destroy(string $id)
    {
        $category = ProjectCategory::query()->findOrFail($id);
        $category->delete();

        return Response::HTTP_OK;
    }
}
