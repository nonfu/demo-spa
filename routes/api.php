<?php

use App\Http\Controllers\PostController;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return new UserResource($request->user());
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/category/{name}', [PostController::class, 'category']);
Route::get('/posts/categories', [PostController::class, 'categories']);
Route::middleware('auth:sanctum')->post('/posts/store', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show']);
