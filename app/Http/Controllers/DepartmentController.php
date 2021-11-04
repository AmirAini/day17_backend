<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function index(){
        //paginate
        $users = Department::paginate(15);
        return view('branch.users', ['users'=>$users]); //carry
    }


    public function edit(Request $request){

        //target, use first() to do query
        $user = Department::where('id',$request->id)->first();

        if(isset($request->name) && isset($request->email)) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return redirect()->route('users');
        } else {
            return view('branch.departmentEdit',['user'=>$user]);
        }
    }

    public function delete(Request $request){
        //target
        $user = Department::where('id',$request->id)->first();
        $user->delete();
        return redirect()->route('departments');
    }
















}
