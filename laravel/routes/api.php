<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\StoryController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::group(['middleware' => ['auth:sanctum']],function(){
     //user
     Route::get('/user/{id}', [AuthController::class, 'user']);
     Route::put('/user', [AuthController::class, 'update']);
     Route::post('/logout', [AuthController::class, 'logout']);

     //Post
     Route::get('/posts', [PostController::class, 'index']);//all post
     Route::post('/posts', [PostController::class, 'store']);//create post
     Route::get('/posts/{id}', [PostController::class, 'show']);//get single post
     Route::delete('/posts/{id}', [PostController::class, 'destroy']);//delete post

     //Story
     Route::get('/stories',[StoryController::class, 'index']);
     Route::post('/stories',[StoryController::class, 'store']);
     Route::delete('/stories/{id}', [StoryController::class, 'destroy']);

     //comment
     Route::get('/posts/{id}/comments', [CommentController::class, 'index']);//all comment of a post
     Route::post('/posts/{id}/comments', [CommentController::class, 'store']);//create comment on a post
     Route::delete('/comments/{id}', [CommentController::class, 'destroy']);//delete comment

     //like
     Route::post('/posts/{id}/likes', [LikeController::class, 'likeOrUnlike']);//like or dislike a post
});
