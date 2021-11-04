<?php

namespace App\Http\Controllers;

use App\Models\Job;
use JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    // public function index(){
    //     return view('admin.login');
    // }

    // public function login(Request $request) {
    //     if($request->isMethod('post')){
    //         $credentials = $request->validate([                
    //             'email' => ['required','email'], 
    //             'password' => ['required'],
    //         ]);

    //         if (Auth::attempt($credentials)) {
    //             if(Auth::user()->role==1){
    //                 $request->session()->regenerate();
    //                 return redirect()->intended('/dashboard');
    //             } else {
    //             return redirect('/admin/login');
    //         }
    //         }
    //     }
    // }
    public function index(Request $request){
        if($request->isMethod('post')){
            $credentials = $request->validate([                
                'email' => ['required','email'], //rfc and dns to validate if the email is valid or not
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) { //problem here
                if (Auth::user()->role == 1){
                $request->session()->regenerate();
                $jwt_token = JWTAuth::attempt($credentials);
                
                session(['jwt_token'=>$jwt_token]);
                return redirect()->route('dashboard');
            }else {
                return redirect('admin/dashboard');
            }
            }

            return back()->withErrors([
                'email'=>'The provide credentials do not meet our record',
            ]);
        
        }
        return view('admin.login');
    }


    public function dashboard(){

        $jwt_token = session('jwt_token');

        $user=User::get()->count();
        $department=DB::table('departments')->count();
        $job=DB::table('jobs')->count();

        //push variable
        return view('admin.dashboard', compact('jwt_token','user','department','job'));
        // ['user'=>$user,
        // 'department'=>$department]);
        // ['job'=>$job],);
    }

    
}