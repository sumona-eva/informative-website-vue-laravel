<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\ValidationException;

class BusinessSettingController extends Controller
{
    public function index()
    {
        $settings = [
            'bSettings' =>[
                'hero' => json_decode($this->get_setting('hero')),
                'profile' => json_decode($this->get_setting('profile')),
                'social' => json_decode($this->get_setting('social')),
                'counter' => json_decode($this->get_setting('counter')),
            ]
        ];

        return response()->json($settings);
    }

    public function updateSetting(): \Illuminate\Http\JsonResponse
    {
        foreach (Request::all() as $type => $value){
            $business_settings = BusinessSetting::where('type', $type)->first();
            if($business_settings != null) {
                if ($value != null){
                    if ($type == 'timezone' && gettype($value) != 'array'){
                        $value = $business_settings->value;
                    }
                    if(gettype($value) == 'array'){
                        $business_settings->value = json_encode($value);
                    }
                    else {
                        $business_settings->value = $value;
                    }
                    $business_settings->save();
                }
            } else{
                if ($value != null){
                    $business_settings = new BusinessSetting;
                    $business_settings->type = $type;
                    if(gettype($value) == 'array'){
                        $business_settings->value = json_encode($value);
                    }
                    else {
                        $business_settings->value = $value;
                    }
                    $business_settings->save();
                }
            }
        }

        return response()->json([
            'message' => 'Update Business Settings...'
        ]);
    }

    public function updateProfile()
    {
//        return Request::all();
        Request::validate([
            'name' => 'required|max:255',
            'email' => 'required|email'
        ]);

        $user = User::query()->findOrFail(Auth::id());
        if($name = Request::input('name')){
            $user->name = $name;
        }

        $email = Request::input('email');
        if ($email !== null) {
            $user->email = $email;
        }
        if(Request::hasFile('image')) $user->image = Request::file('image')->store('/profile');

        $user->save();
        return response()->json([
            'message' => 'Your Profile has been Updated...'
        ]);
    }


    /**
     * @throws ValidationException
     */
    public function updatePassword(Request $request)
    {
        $user = User::query()->findOrFail(Auth::id());
        $hashedPassword = $user->password;

        Request::validate([
            'current_password' => 'required',
            'new_passwrod'=> 'required|min:6',
            'confirm_password' => 'required|min:6|same:new_passwrod',
        ]);

        if (Hash::check(Request::input('current_password'), $hashedPassword)) {
            if (!Hash::check(Request::input("new_passwrod"), $hashedPassword)) {
                $user->update([
                    'password' => Hash::make(Request::input("new_passwrod"))
                ]);
                return response()->json(['message' => "New Password Updated.."]);
            } else {
                throw ValidationException::withMessages(['new_passwrod' => "New Password Can Not Be Same As Same Password"]);
            }
        } else {
            throw ValidationException::withMessages(['current_password' => "Current Password Not Match"]);
        }
    }




    public function get_setting($key, $default = null)
    {
        $setting = BusinessSetting::where('type', $key)->first();
        return $setting == null ? $default : $setting->value;
    }

}
