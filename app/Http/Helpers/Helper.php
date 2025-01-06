<?php
use App\Models\Setting;
// use Intervention\Image\ImageManager;
// use Intervention\Image\Encoders\WebpEncoder;    
// use Intervention\Image\Drivers\Gd\Driver;



if (!function_exists('getSetting')) {
    function getSetting($key, $default = null)
    {
        $setting = Setting::where('key', $key)->first();
        return $setting == null ? $default : $setting->value;
    }
}

// if(!function_exists('uploadFile')) {
//     function uploadFile($file, $uploadPath, $modifiedPath, $fileNamePrefix, $resizeWidth = null, $resizeHeight = null, $quality = 50) 
//     {
//         $imageName = $fileNamePrefix . '-'. time() . '.webp';

//         $destinationPath = public_path($uploadPath);
        
//         $file->move($destinationPath, $imageName);

//         $manager = new ImageManager(new Driver());

//         $modImg = $manager->read(public_path($uploadPath . '/' . $imageName));

//         $modImg->encode(new WebpEncoder(quality: $quality));

//         if($resizeWidth !== null && $resizeHeight !== null){
//             $modImg->resize($resizeWidth, $resizeHeight);
//         }
        
//         $modImg->save(public_path($modifiedPath . '/' . $imageName));
//         return '/' . $modifiedPath . '/' . $imageName;
//     }
// }

// if(!function_exists('multipleFileUpload')){
//     function multipleFileUpload($images, $uploadPath, $modifiedPath, $fileNamePrefix = 'file', $resizeWidth = null, $resizeHeight = null, $quality = 50){
//         $uploadedData = array();

//         foreach ($images as $image) {

//             $imageName = $fileNamePrefix . time() . uniqid() . '.webp';
//             $destinationPath = public_path($uploadPath);

//             $image['file']->move($destinationPath, $imageName);


//             $manager = new ImageManager(new Driver());

//             $modImg = $manager->read(public_path($uploadPath . '/' . $imageName));

//             $modImg->encode(new WebpEncoder(quality: $quality));

//             if($resizeWidth !== null && $resizeHeight !== null){
//                 $modImg->resize($resizeWidth, $resizeHeight);
//             }

//             $modImg->save(public_path($modifiedPath . '/' . $imageName));
//             $uploadedData[] = '/' . $modifiedPath . '/' . $imageName;
//         }
//         return $uploadedData;
//     }
// }
