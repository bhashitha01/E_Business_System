<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //customer login
    public function showLogin(){
        return view('auth.login');
    }

    //admin login
    public function adminshowLogin(){
        return view('admin.login');
    }

    public function adminLogin(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $credentials['role'] = 'admin';
    $credentials['status'] = true;

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        return redirect('/admin/dashboard');
    }

    return back()->withErrors([
        'email' => 'Invalid admin credentials.',
    ])->onlyInput('email');
}
//adminlogout
public function adminLogout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('admin.login');
}

    }


