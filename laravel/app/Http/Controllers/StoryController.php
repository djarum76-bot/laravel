<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        return response([
            // 'user' => auth()->user()
            'user' => User::withCount('stories')
                        ->with('stories',function($story){
                            return $story->select('id','user_id','image','created_at')->orderBy('id','desc')->get();
                        })->get()
        ], 200);
    }

    public function store(Request $request)
    {
        $image = $this->saveImage($request->image, 'stories');

        $post = Story::create([
            'user_id' => auth()->user()->id,
            'image' => $image
        ]);

        return response([
            'message' => 'Story Created',
            'post' => $post
        ],200);
    }

    public function destroy($id)
    {
        $story = Story::find($id);

        if(!$story)
        {
            return response([
                'message' => 'Story not found'
            ],403);
        }

        if($story->user_id != auth()->user()->id)
        {
            return response([
                'message' => 'Permission denied'
            ],403);
        }

        $story->delete();

        return response([
            'message' => 'Story deleted'
        ],200);
    }
}
