<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Setting;

class SettingController extends Controller
{
    
    public function index()
    {
        $settings = [
            'email_address' =>  getSetting('email_address'),
            'phone_number' => getSetting('phone_number'),
            'whatsapp_number' => getSetting('whatsapp_number'),
            'yt_video_iframe' => getSetting('yt_video_iframe'),
            'socials' => json_decode(getSetting('socials')),
            'projects' => json_decode(getSetting('projects')),
            'experts' => json_decode(getSetting('experts')),
            'clients' => json_decode(getSetting('clients')),
            'privacy_policy' => getSetting('privacy_policy'),
            'terms_copyright' => getSetting('terms_copyright'),
        ];
        return response()->json($settings);
    }

    public function store(Request $request)
    {
        $data =  $request->all();
        foreach($data as $type => $value){
            $settings = Setting::where('key', $type)->first();

            if($settings != null) {
                if($value != null) {
                    if(gettype($value) == 'array'){
                        $settings->value = json_encode($value);
                    }
                    else {
                        $settings->value = $value;
                    }
                    $settings->save();
                }
            }else {
                if ($value != null){
                    $settings = new Setting;
                    $settings->key = $type;
                    if(gettype($value) == 'array'){
                        $settings->value = json_encode($value);
                    }
                    else {
                        $settings->value = $value;
                    }
                    $settings->save();
                }
            }
        }

        return Response::HTTP_OK;
    }
}
