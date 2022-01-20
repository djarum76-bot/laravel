<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    //get all comments off a post
    public function index($id)
    {
        $post = Post::find($id);

        if(!$post)
        {
            return response([
                'message' => 'Post not found'
            ],403);
        }

        return response([
            'post' => $post->comments()->with('user:id,username,image')->get()
        ],200);
    }

    //create a new comment
    public function store(Request $request, $id)
    {
        $post = Post::find($id);

        if(!$post)
        {
            return response([
                'message' => 'Post not found'
            ],403);
        }

        $attrs = $request->validate([
            'comment' => 'required|string'
        ]);

        Comment::create([
            'comment' => $attrs['comment'],
            'user_id' => auth()->user()->id,
            'post_id' => $id
        ]);

        return response([
            'message' => 'Comment created'
        ],200);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        if(!$comment)
        {
            return response([
                'message' => 'Comment not found'
            ],403);
        }

        if($comment->user_id != auth()->user()->id)
        {
            return response([
                'message' => 'Permission denied'
            ],403);
        }

        $comment->delete();

        return response([
            'message' => 'Comment deleted'
        ],200);
    }
}
