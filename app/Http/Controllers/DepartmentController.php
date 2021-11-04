<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function index(){
        //paginate
        $departments = Department::paginate(15);
        return view('branch.department', ['departments'=>$departments]); //carry
    }


    public function edit(Request $request){

        //target, use first() to do query
        $department = Department::where('id',$request->id)->first();

        if(isset($request->department_name)) {
            $department->department_name = $request->department_name;
            $department->save();
            return redirect()->route('departments');
        } else {
            return view('branch.departmentEdit',compact('department'));
        }
    }

    public function delete(Request $request){
        //target
        $department = Department::where('id',$request->id)->first();
        $department->delete();
        return redirect()->route('departments');
    }
















}
