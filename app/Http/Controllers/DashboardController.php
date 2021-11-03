<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// class DashboardController extends Controller
// {
//     //
//     public function dashboard(){

//         $user=User::get()->count();
//         $department=DB::table('departments')->count();
//         $job=Job::get()->count();

//         //push variable
//         return view('admin.dashboard',
//         ['user'=>$user],
//         ['department'=>$department],
//         ['jobs'=>$job],
//     );
        
//     }
// }
