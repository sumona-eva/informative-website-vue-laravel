<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\TeamRquest;
use App\Http\Resources\V1\TeamResource;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team = TeamMember::query()->latest()->get();

        return TeamResource::collection($team);
    }
    public function store(TeamRquest $request)
    {
        $data = $request->validated();
        if ($image = $request->file('photo')) {
            $data['photo'] = '/images/' . $image->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());
        }
        $member = TeamMember::query()->create($data);

        return TeamResource::make($member);
    }

    public function update(Request $request, string $id)
    {
        $member = TeamMember::query()->findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string',
            'photo' => 'nullable',
            'position' => 'required|string',
            'order_number' => 'required',
            'intro' => 'nullable|string'
        ]);
        if ($image = $request->file('photo')) {
            $data['photo'] = '/images/' . $image->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());
        }
        $member->update($data);

        return TeamResource::make($member);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = TeamMember::query()->findOrFail($id);
        $member->delete();

        return Response::HTTP_OK;
    }
}
