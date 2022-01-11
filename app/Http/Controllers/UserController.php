<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class UserController extends Controller
{
    public  function index(){
        $users = User::all();
        return response()->json(['users' => $users]);
    }

    public function store(){
        $user = new  User();
        $user->name = 'Karim';
        $user->email = rand(200,4000).'Karim@gmail.com';
        $user->password = 'Karim';
        $user->save();
        return response()->json(['user' => $user]);
    }

    public function update(){
        $user  = User::where('id',6)->update(['name','a']);
        return $user;
    }
    public function show($id){

//$res=User::where('id','=',$id)->where('category','=',$category)->get();

        $res=User::where('id','=',$id)->first();
        if($res){
            return response()->json(['message' => $res]);
        }else{
            return response()->json(['message' => 'Not  Found']);
        }

    }
    public function delete($id){

        $res=User::where('id',$id)->delete();
        if($res == 1){
            return response()->json(['message' => $res]);
        }else{
            return response()->json(['message' => 'Not  Found']);
        }

    }



}
