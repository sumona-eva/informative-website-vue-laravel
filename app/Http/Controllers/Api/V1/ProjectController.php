<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\ProjectRequest;
use App\Http\Resources\V1\ProjectResource;
use App\Models\Project;
use App\Models\ProjectImages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::query()->latest()->get();

        return ProjectResource::collection($projects);
    }

   
    public function store(ProjectRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        if ($image = $request->file('cover_image')) {
            $data['cover_image'] = '/images/' . $image->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());
        }

        $project = Project::query()->create($data);

        if (isset($data['images'])) {
            $images = $data['images'];
            $imageData = [];
            
            foreach ($images as $image) {
                $imageName = $image['file']->getClientOriginalName();
                $image['file']->move(public_path('images'), $imageName);
                
                $imageData[] = [
                    'url' => '/images/' . $imageName,
                    'project_id' => $project->id,
                ];
            }
        
            ProjectImages::query()->insert($imageData);
        }

        

        return ProjectResource::make($project);
    }

    public function show($slug)
    {
        $project = Project::query()->where('slug', $slug)->with('images')->firstOrFail();
        return ProjectResource::make($project);
    }
    public function update(Request $request, string $id)
    {
        $project = Project::query()->findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string',
            'slug' => 'nullable|string',
            'project_category_id' => 'required|integer',
            'cover_image' => 'nullable',
            'description' => 'nullable|string',
            'order_number' =>  'required|integer',
			'images' => 'nullable|array'
        ]);
        $data['slug'] = Str::slug($data['title']);
        if ($image = $request->file('cover_image')) {
            $data['cover_image'] = '/images/' . $image->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());
        }
		if (isset($data['images'])) {
            $images = $data['images'];
            $imageData = [];
            
            foreach ($images as $image) {
                $imageName = $image['file']->getClientOriginalName();
                $image['file']->move(public_path('images'), $imageName);
                
                $imageData[] = [
                    'url' => '/images/' . $imageName,
                    'project_id' => $project->id,
                ];
            }
        
            ProjectImages::query()->insert($imageData);
        }
        $project->update($data);
        return ProjectResource::make($project);
    }

    public function deleteProjectImage($id)
    {
        $image = ProjectImages::query()->find($id);
        $image->delete();

        return Response::HTTP_OK;
    }
        public function destroy(string $id)
    {
        $project = Project::query()->findOrFail($id);
        $project->delete();
        return Response::HTTP_OK;
    }
}
