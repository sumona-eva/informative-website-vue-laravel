<?php

namespace App\Http\Controllers\Api\Frontend\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\ProjectRequest;
use App\Http\Resources\V1\WorkStepResource;
use App\Http\Requests\V1\ReviewRequest;
use App\Models\Project;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\Package;
use App\Models\ProjectCategory;
use App\Models\TeamMember;
use App\Models\WorkStep;
use App\Models\Review;
use App\Models\Trending;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function eyeArt()
    {
        $data = [];
        $data['slider'] = Slider::query()
            ->select('image', 'url')
            ->orderBy('order_number')
            ->get();

        $data['services'] = Service::query()
            ->select('name','image', 'icon','slug')
            ->orderBy('order_number')
            ->get();

        
        $packages = Package::query()
            ->select('slug', 'name','sub_titles', 'items')
            ->latest()
            ->get();
        foreach($packages as $package){
            $package->sub_titles = json_decode($package->sub_titles);
            $package->items = json_decode($package->items);
        }   
        
        $data['package'] = $packages;


        $data['project']  = Project::query()
            ->select('cover_image', 'title', 'slug',)
            ->latest('id')
            ->get();

        $data['work_step'] = WorkStep::query()
            ->orderBy('order_number')
            ->get();    

        $data['blog'] = Blog::query()
            ->select('title', 'image','created_at', 'slug','author_name')
            ->paginate(9);

         $data['team'] = TeamMember::query()
            ->select('name', 'position', 'intro', 'photo')
            ->orderBy('order_number')
            ->get();   
        
         $data['review'] = Review::query()->latest()->get();   

         $data['trending'] = Trending::query()->orderBy('order_number')->get();   
        $data['privacy_policy'] = getSetting('privacy_policy');
        $data['terms_copyright'] = getSetting('terms_copyright');  
		$data['project_categories'] = ProjectCategory::query()->get();
         $data['setting'] = [
            'phone_number' => getSetting('phone_number'),
            'whatsapp_number' => getSetting('whatsapp_number'),
            'yt_video_iframe' => getSetting('yt_video_iframe'),
            'email_address' => getSetting('email_address'),
            'projects' => getSetting('projects'),
            'experts' => getSetting('experts'),
            'clients' => getSetting('clients'),
            'socials' => json_decode(getSetting('socials')),
            
         ];
            
        return response()->json($data);
    }

    public function saveReview(ReviewRequest $request)
    {
        $data = $request->validated();
        Review::query()->create($data);
        return response()->json(['message' => 'Review submitted successfully']);
    }
    public function getHeroSlider()
    {
        $heroSlider = Slider::query()->select('image', 'url')->orderBy('order_number')->get();
        return response()->json($heroSlider);
    }

    public function getHomeService()
    {
        $services = Service::all();
        return response()->json($services);
    }

    public function getHomeAboutContent()
    {
        //
    }

    public function getRecentProject()
    {
        $projects = Project::query()->latest()->get();

        return response()->json($projects);
    }

    public function getTeam()
    {
        $teamMembers = TeamMember::query()->latest()->get();

        return response()->json($teamMembers);
    }

    public function getPosts()
    {
        $post = Blog::query()->latest()->get();

        return response()->json($post);
    }

    public function getSinglePost($slug)
    {
        $post = Blog::query()->where('slug', $slug)->first();


        return response()->json($post);
    }

    public function getWorkStep() 
    {
        $steps = WorkStep::query()->get();

        return WorkStepResource::collection($steps);
    }
}
