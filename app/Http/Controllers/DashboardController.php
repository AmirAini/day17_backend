<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        // this is the good practice
        // we want to pass the variables from controller to names
        
        $users = User::get();
        $users = User::paginate(10);

        return view('dashboard',
        ["user"=>$users]);
        
    }
}
