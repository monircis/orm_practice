<?php

use App\User;
use App\Address;
use App\Post;
use App\Project;
use App\Task;
use App\Tag;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
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

Route::get('/projects', function () {
//$project = Project::create([
//    'title' => ' Project A'
//]);
//$user1 = User::create([
//'name' => 'User 1',
//    'project_id' => $project->id,
//'email' => 'User1@gmail.com',
//'password' =>hash::make('password'),
//]);
//    $user2 = User::create([
//        'name' => 'User 2',
//        'project_id' => $project->id,
//        'email' => 'User2@gmail.com',
//        'password' =>hash::make('password'),
//    ]);
//$task1 = Task::create([
//    'title' => 'Task 1  Project 1',
//    'user_id' => $user1->id
//]);
//    $task2 = Task::create([
//        'title' => 'Task 2  Project 1',
//        'user_id' => $user2->id
//    ]);
//    $task3 = Task::create([
//        'title' => 'Task 2  Project 1',
//        'user_id' => $user1->id
//    ]);

    $project =Project::find(2);
// return $project->users[0]->tasks;
// return $project->tasks;
 return $project->task;
});


Route::get('/users/posts', function () {

    $post = Post::first();
    $post->tags()->sync([
        2 => [
            'status' => 'Approved'
        ]
    ]);

    //if we need any  operation when attach detach call we can easily do this by event handing
    //detach will execute deleted event from post_tag
//    $post->tags()->detach([
//        2 =>[
//            'status' => 'Approved'
//        ]
//    ]);
    //attach will execute creating  or created event from post_tag

//    $post->tags()->attach([
//        2 =>[
//            'status' => 'Approved'
//        ]
//    ]);

    exit();
    $post = Post::first();
    dd($post->tags->first()->pivot->status);

    $posts = Post::with('user', 'tags')->get();
    return view('user-post', compact('posts'));


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
