<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //get all post
    public function index()
    {
        return response([
            'posts' => Post::orderBy('created_at', 'desc')->with('user:id,username,image')->withCount('comments', 'likes')
            ->with('likes', function($like){
                return $like->where('user_id', auth()->user()->id)
                    ->select('id','user_id','post_id')->get();
            })
            ->get()
        ],200);
    }

    //creaete a post
    public function store(Request $request)
    {
        //validate field
        $attrs = $request->validate([
            'body' => 'required|string',
            'image' => 'required'
        ]);

        $image = $this->saveImage($request->image, 'posts');

        $post = Post::create([
            'body' => $attrs['body'],
            'user_id' => auth()->user()->id,
            'image' => $image
        ]);

        return response([
            'message' => 'Post Created',
            'post' => $post
        ],200);
    }

    //get single post
    public function show($id)
    {
        return response([
            'post' => Post::where('id', $id)->with('user:id,username,image')->withCount('comments', 'likes')
                        ->with('comments',function($comment){
                            return $comment->select('id','user_id','post_id','comment','created_at')->with('user:id,username,image')->orderBy('id','desc')->get();
                        })->with('likes', function($like){
                            return $like->where('user_id', auth()->user()->id)
                                ->select('id','user_id','post_id')->get();
                        })->get()
        ],200);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if(!$post)
        {
            return response([
                'message' => 'Post not found'
            ],403);
        }

        if($post->user_id != auth()->user()->id)
        {
            return response([
                'message' => 'Permission denied'
            ],403);
        }

        $post->comments()->delete();
        $post->likes()->delete();
        $post->delete();

        return response([
            'message' => 'Post deleted'
        ],200);
    }
}
