<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index(){
        //paginate
        $jobs = Job::paginate(15);
        return view('branch.jobs', ['jobs'=>$jobs]); //carry
    }


    public function edit(Request $request){

        //target, use first() to do query
        $job = Job::where('id',$request->id)->first();

        //changed
        if(isset($request->title) && isset($request->text)) {
            $job->title = $request->title;
            $job->text = $request->text;
            $job->save();
            return redirect()->route('jobs');
        } else {

            return view('branch.users',['job'=>$job]);
        }
    }

    // public function delete(Request $request){
    //     //target
    //     $job = Job::where('id',$request->id)->first();
    //     $job->delete();
    //     return redirect()->route('jobs');
    // }



}
