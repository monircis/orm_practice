<?php

use App\User;
use App\Address;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/users/posts', function () {
//\App\Tag::create([
//   'name' => 'Php'
//]);
//    $post = Post::with('tags')->first();
//    $post->tags()->attach([1,2,3]);

    //for remove  tag  id
//        $post = Post::with('tags')->first();
//    $post->tags()->detach([1]);

    //sync  will delete  old tags  and  assign new  one
//    $post->tags()->sync([1]);
//exit();

    //    $users = User::get();
    //has('posts') will show only user who  have  posts
//    $users = User::has('posts' , '>=',2)->with('posts')->get();
//    $users = User::whereHas('posts', function ($query){
//        $query->where('title', 'like', '%my%');
//    })->with('posts')->get();
//    $users = User::doesntHave('posts')->with('posts')->get();
//    $users = User::has('posts')->with('posts')->get();

    $posts = Post::with('user', 'tags')->get();
    return view('user-post', compact('posts'));
});

Route::get('/tags', function () {
    $tags = Tag::with('posts')->get();
    return view('tag', compact('tags'));
});

Route::get('/users', function () {
    $users = User::with('addresses')->get();
    return view('user', compact('users'));
});

Route::get('/posts', function () {

    $posts = Post::get();
    return view('post', compact('posts'));

//    \App\Post::create(
//        [
//            'user_id' =>3,
//            'title' =>'post title 1',
//            'description' =>'post dscription 1',
//        ]
//    );

});


Route::get('/mix', function () {

//post multiple table data with foregin key relation table example
//    $user = factory(\App\User::class)->create();
//    $user->address()->create([
//       'address' =>'NO',
//       'country' =>'US',
//    ]);

    //This ORM  use will create  n+1 issue and  foreach data will execute a  new query
//  $users = User::all();

    //with  use will solve  N+1  issue  solved no repeat  query execute
    $users = User::with('Address')->get();

    //This ORM  use will create  n+1 issue and  foreach data will execute a  new query
//    $users = Address::all();

    //with  use will solve  N+1  issue  solved no repeat  query execute
//    $users = Address::with('User')->get();

    return view('welcome', compact('users'));
});
