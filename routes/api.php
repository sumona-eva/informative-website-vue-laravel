<?php

use App\Http\Controllers\Api\Frontend\V1\HomeController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ProjectCategoryController;
use App\Http\Controllers\Api\V1\RequestController;
use App\Http\Controllers\Api\V1\ServicesController;
use App\Http\Controllers\Api\V1\ProjectController;
use App\Http\Controllers\Api\V1\SettingController;
use App\Http\Controllers\Api\V1\SliderController;
use App\Http\Controllers\Api\V1\TeamController;
use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\PackageController;
use App\Http\Controllers\Api\Frontend\V1\ServiceController as FrontendServiceController;
use App\Http\Controllers\Api\Frontend\V1\ProjectController as FrontendProjectController;
use App\Http\Controllers\Api\Frontend\V1\PackageController as FrontendPackageController;
use App\Http\Controllers\Api\V1\DashboardController;
use App\Http\Controllers\Api\V1\ReviewController;
use App\Http\Controllers\Api\V1\TrendingController;
use App\Http\Controllers\Api\V1\WorkStepController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', \App\Http\Controllers\Api\Auth\LoginCotroller::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/eye-art', [HomeController::class, 'eyeArt']);

//dashboard route
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::post('/delete-project-image/{id}', [ProjectController::class, 'deleteProjectImage']);
    Route::get('/get-dashboard-data', [DashboardController::class, 'index']);
    Route::apiResources([
        'slider' => SliderController::class,
        'service' => ServicesController::class,
        'project-category' => ProjectCategoryController::class,
        'project' => ProjectController::class,
        'team-member' => TeamController::class,
        'blog' => BlogController::class,
        'setting' => SettingController::class,
        'package' => PackageController::class,
        'work-step' => WorkStepController::class,
        'trending' => TrendingController::class,
		'review' => ReviewController::class
    ]);
    Route::get('/get-all-inquires', [RequestController::class, 'getInquiries']);
    Route::get('/delete-inquiry/{id}', [RequestController::class, 'deleteInquiry']);
});

//frontend route
Route::prefix('frontend')->group(function () {
    Route::get('/get-review', [HomeController::class, 'getReview']);
    Route::post('/save-review', [HomeController::class, 'saveReview']);
    Route::get('/slider', [HomeController::class, 'getHeroSlider']);
    Route::get('/service', [HomeController::class, 'getHomeService']);
    Route::get('/recent-project', [HomeController::class, 'getRecentProject']);
    Route::get('/service', [FrontendServiceController::class, 'index']);
    Route::get('/service-detail/{slug}', [FrontendServiceController::class, 'serviceDetail']);
    Route::get('/project', [FrontendProjectController::class, 'index']);
    Route::get('/project-detail/{slug}', [FrontendProjectController::class, 'singleProject']);
    Route::get('/team', [HomeController::class, 'getTeam']);
    Route::apiResource('package', FrontendPackageController::class);
    Route::post('/save-inquiry', [RequestController::class, 'saveInquiry']);
    Route::get('/posts', [HomeController::class, 'getPosts']);
    Route::get('/post/{slug}', [HomeController::class, 'getSinglePost']);
    Route::get('/get-work-step', [HomeController::class, 'getWorkStep']);
});

Route::get('/storage', fn() => \Illuminate\Support\Facades\Artisan::call('storage:link'));
