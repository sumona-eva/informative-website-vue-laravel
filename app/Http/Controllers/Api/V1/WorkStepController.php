<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\V1\WorkStepResource;
use App\Models\WorkStep;

class WorkStepController extends Controller
{

    public function index()
    {
        return WorkStepResource::collection(WorkStep::query()->get());
    }

   
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string', 'max:255'],
            'description' => ['nullable','string'],
            'order_number' => ['nullable','integer'],
        ]);
        return WorkStepResource::make(WorkStep::create($data));
    }

    public function show(string $id)
    {
        
    }


    public function update(Request $request, string $id)
    {
        $workStep  = WorkStep::query()->find($id);
        $data = $request->validate([
            'title' => ['required','string', 'max:255'],
            'description' => ['nullable','string'],
            'order_number' => ['nullable','integer'],
        ]);
        $workStep->update($data);
        return WorkStepResource::make($workStep);
    }


    public function destroy(string $id)
    {
        $workStep = WorkStep::query()->find($id);
        $workStep->delete();
        return response(null, 204);
    }
}
