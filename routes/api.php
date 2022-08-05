<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SiteMechanismController;
use App\Http\Controllers\SiteUiController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['cors']], function () {

    // Non Auth routes
    Route::get('/details', [DetailController::class, 'index']);
    Route::get('/languages', [LanguageController::class, 'index']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/projects', [ProjectController::class, 'index']);
    Route::get('/project/{slug}', [ProjectController::class, 'slug']);
    Route::get('/tags' , [CategoryController::class, 'tags']);
    Route::get('/sitemechanism', [SiteMechanismController::class, 'index']);
    Route::get('/siteui', [SiteUiController::class, 'index']);
    Route::post('/contact', [ContactController::class, 'store']);

});

// Auth routes ['middleware' => ['auth', 'web']]
Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'admin'], function () {

    Route::post('/image/store', [ImageController::class, 'store']);

    // Project routes
    Route::post('/project/store', [ProjectController::class, 'store']);
    Route::get('/projects', [ProjectController::class, 'projects']);
    Route::get('/project/{id}', [ProjectController::class, 'show']);
    Route::delete('/project/delete/{id}', [ProjectController::class, 'destroy']);
    Route::put('/project/{id}', [ProjectController::class, 'update']);

    // URL availability check
    Route::post('urlcheck', [ProjectController::class, 'urlcheck']);

    // Category routes
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/category/{id}', [CategoryController::class, 'show']);
    Route::put('/category/{id}', [CategoryController::class, 'update']);
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

    // site mechanism url
    Route::post('/sitemechanism/store', [SiteMechanismController::class, 'store']);

    //site UI url
    Route::post('/siteui/banner', [SiteUiController::class, 'banner']);
    Route::post('/siteui/logo', [SiteUiController::class, 'logo']);
    Route::post('/siteui/footer', [SiteUiController::class, 'store']);
    Route::post('/siteui/details', [DetailController::class, 'store']);

    // Languages routes
    Route::post('/language', [LanguageController::class, 'store']);
    Route::get('/language/{id}', [LanguageController::class, 'show']);

    // User routes
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

});

// Start testing url

// End testing url

