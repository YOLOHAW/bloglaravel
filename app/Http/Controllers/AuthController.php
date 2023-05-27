<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(){
        // 
        $formData=request()->validate([
            'name'=>['required','max:255','min:8'],
            'username'=>['required','max:255','min:8',Rule::unique('users','username')],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','min:8']
        ]);
        // dd('success');
        $user=User::create($formData);
        // session()->flash('success','Welcome '.$user->name);
        auth()->login($user);
        return redirect("/")->with('success','Welcome '.$user->name);
    }
    public function logout(){
        auth()->logout();
        return redirect("/")->with("success","Good Bye. See you Soon");
    }
    public function login(){
        return view('auth.login');
    }
    public function post_login(){
        $formData=request()->validate(
            ([
            'email'=>['required',Rule::exists('users','email')],
            'password'=>'required|min:8|max:255'
        ]),
        [
            'email.required'=>'We need Your fcking email Address',
            'password.min'=>'Password should be more than 8 sir'
        ]);

        // dd($formData);
        if(auth()->attempt($formData)){
            if(auth()->user()->is_admin){
                return redirect('/admin/blogs');
            }else{
                return redirect("/")->with("success","LogIn successful,Welcome Back");
            }
        }else{
            return redirect()->back()->withErrors([
                'email'=>'User credentials Wrong'
            ]);
        }


    }
}
