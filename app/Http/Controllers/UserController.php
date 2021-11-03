<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        //paginate
        $users = User::paginate(15);
        return view('branch.users', ['users'=>$users]); //carry
    }


    public function edit(Request $request){

        //target, use first() to do query
        $user = User::where('id',$request->id)->first();

        if(isset($request->name) && isset($request->email)) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return redirect()->route('users');
        } else {
            return view('branch.usersEdit',['user'=>$user]);
        }
    }

    public function delete(Request $request){
        //target
        $user = User::where('id',$request->id)->first();
        $user->delete();
        return redirect()->route('users');
    }




}

