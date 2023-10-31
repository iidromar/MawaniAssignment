<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{

    public function login_page(){
        return view('user.login');
    }

    public function login(Request $request){

        // validate data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            session()->flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }

        // login code
        // set the remember me cookie if the user check the box
        $remember = $request->has('remember') ? true : false;

        // attempt to do the login
        $auth = Auth::attempt(
            [
                'email'  => $request->email,
                'password'  => $request->password
            ], $remember
        );
        if ($auth) {
            session()->flash('Add', 'Login Successfully.');
            return redirect()->route('index');
        } else {

            return redirect()->route('login')->withError('Login details are not valid.');

        }}
    public function register_page(){
        return view('user.register');
    }
    public function register(Request $request){

        // validate
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users|regex:/(.+)@(.+)\.(.+)/i',
            'name' => 'required|string|max:50',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            session()->flash('Error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }

        // save in users table
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // login user here
        if(Auth::attempt($request->only('email','password'))){

            session()->flash('Add', 'Registered Successfully.');

            return redirect()->route('index');

        }

        return redirect('register')->withError('Login details are not valid.');

    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
