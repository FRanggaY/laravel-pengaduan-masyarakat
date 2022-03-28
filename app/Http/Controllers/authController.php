<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function index(){
        if ($user = Auth::user()) {
            if ($user->level == 'admin') {
                return redirect()->intended('dashboard');
            } elseif ($user->level == 'petugas') {
                return redirect()->intended('dashboard');
            }
        }
        return view('login');
    }

    public function login(request $request){
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);

        // password using bcrypt
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect()->intended('dashboard')->with('success', 'success login');
            } elseif ($user->level == 'petugas') {
                return redirect()->intended('dashboard')->with('success', 'success login');
            }
            return redirect()->intended('/');
        }else{
            return redirect('login')->with('failed', 'username or password wrong');
        }

        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }
    public function logout (Request $request) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login')->with('success', 'logout success');;
    }
}
