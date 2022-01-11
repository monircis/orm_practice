<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Http\Resources\UserResource;
class PostController extends Controller
{
    public function user_detail(){

        $users = User::with('address')->get();
        return response()->json(['users' => UserResource::collection($users) ]);
    }
    public function store(){
        $post = new  Post();
        $post->title = 'This  is first  post';
        $post->description ='This  is first  post description';
        $post->user_id = 2;
        $post->save();
        return response()->json(['post' => $post]);
    }
}
