<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

            if (Auth::attempt($credentials)) {
                if (Auth::user()->role == 1){
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }else {
                return redirect('admin/');
            }
            }

            return back()->withErrors([
                'email'=>'The provide credentials do not meet our record',
            ]);
        
        }
        return view('admin.login');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }
}