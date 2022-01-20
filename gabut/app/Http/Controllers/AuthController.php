<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        //validate field
        $attrs = $request->validate([
            'username' => 'required|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        //create user
        $user = User::create([
            'username' => $attrs['username'],
            'email' => $attrs['email'],
            'password' => bcrypt($attrs['password'])
        ]);

        //return user & token in response
        return response([
            'user' => $user,
            'token' => 'Bearer '.$user->createToken('secret')->plainTextToken
        ], 200);
    }

    public function login(Request $request)
    {
        //validate field
        $attrs = $request->validate([
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        //attempt login
        if(!Auth::attempt($attrs))
        {
            return response([
                'message' => 'Invalid Credentials'
            ], 403);
        }

        //return user & token in response
        return response([
            'user' => auth()->user(),
            'token' => 'Bearer '.$request->user()->createToken('secret')->plainTextToken
        ], 200);

        // return response([
        //     'user' => auth()->user(),
        //     'token' => auth()->user()->createToken('secret')->plainTextToken
        // ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response([
            'message' => 'Logout Success'
        ], 200);
    }

    public function user($id)
    {
        $user = User::find($id);

        if(!$user)
        {
            return response([
                'message' => 'User not found'
            ],403);
        }else
        {
            return response([
                // 'user' => auth()->user()
                'user' => User::withCount('posts')->where('id', '=', $id)
                            ->with('posts',function($post){
                                return $post->select('id','user_id','image')->orderBy('id','desc')->get();
                            })->get()
            ], 200);
        }
    }

    public function update(Request $request)
    {
        $attrs = $request->validate([
            'username' => 'required|string',
        ]);

        $image = $this->saveImage($request->image, 'profiles');

        $request->user()->update([
            'username' => $attrs['username'],
            'image' => $image
        ]);

        return response([
            'message' => 'Profile Updated',
            'user' => auth()->user()
        ],200);
    }
}
